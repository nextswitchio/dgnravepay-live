<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogPost;
use App\Models\CareerPost;
use App\Models\Faq;
use App\Models\Testimonial;
use Illuminate\Support\Collection;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $blogCount = BlogPost::count();
        $careerCount = CareerPost::count();
        $faqCount = Faq::count();
        $testimonialCount = Testimonial::count();

        // Status breakdowns
        $blogPublished = BlogPost::where('is_published', true)->count();
        $blogDraft = max(0, $blogCount - $blogPublished);
        $blogFeatured = BlogPost::where('is_featured', true)->count();

        $careerPublished = CareerPost::where('is_published', true)->count();
        $careerDraft = max(0, $careerCount - $careerPublished);

        $faqPublished = Faq::where('is_published', true)->count();
        $faqDraft = max(0, $faqCount - $faqPublished);

        // Build a simple recent activity feed across core content types
        $recent = collect()
            ->concat(
                BlogPost::select(['title', 'updated_at', 'created_at'])
                    ->latest('updated_at')->take(5)->get()
                    ->map(function ($p) {
                        $ts = $p->updated_at ?: $p->created_at;
                        return [
                            'type' => 'Post',
                            'title' => $p->title,
                            'ts' => $ts,
                            'when' => optional($ts)->diffForHumans() ?? '—',
                        ];
                    })
            )
            ->concat(
                CareerPost::select(['title', 'updated_at', 'created_at'])
                    ->latest('updated_at')->take(5)->get()
                    ->map(function ($c) {
                        $ts = $c->updated_at ?: $c->created_at;
                        return [
                            'type' => 'Career',
                            'title' => $c->title,
                            'ts' => $ts,
                            'when' => optional($ts)->diffForHumans() ?? '—',
                        ];
                    })
            )
            ->concat(
                Faq::select(['question', 'updated_at', 'created_at'])
                    ->latest('updated_at')->take(5)->get()
                    ->map(function ($f) {
                        $ts = $f->updated_at ?: $f->created_at;
                        return [
                            'type' => 'FAQ',
                            'title' => $f->question,
                            'ts' => $ts,
                            'when' => optional($ts)->diffForHumans() ?? '—',
                        ];
                    })
            )
            ->concat(
                Testimonial::select(['name', 'updated_at', 'created_at'])
                    ->latest('updated_at')->take(5)->get()
                    ->map(function ($t) {
                        $ts = $t->updated_at ?: $t->created_at;
                        return [
                            'type' => 'Testimonial',
                            'title' => $t->name ?: 'Unnamed',
                            'ts' => $ts,
                            'when' => optional($ts)->diffForHumans() ?? '—',
                        ];
                    })
            )
            ->sortByDesc('ts')
            ->take(8)
            ->values()
            ->toArray();

        // Trend data (last 7 and 30 days) based on updated_at per day
        $trend7 = $this->buildTrendData(7);
        $trend30 = $this->buildTrendData(30);

        // Top tags by published posts usage
        $topTags = \App\Models\Tag::query()
            ->withCount(['posts as posts_count' => function ($q) {
                $q->where('is_published', true);
            }])
            ->orderByDesc('posts_count')
            ->take(10)
            ->get(['id', 'name', 'slug']);

        return view('admin.dashboard', compact(
            'blogCount',
            'careerCount',
            'faqCount',
            'testimonialCount',
            'blogPublished',
            'blogDraft',
            'blogFeatured',
            'careerPublished',
            'careerDraft',
            'faqPublished',
            'faqDraft',
            'recent',
            'trend7',
            'trend30',
            'topTags'
        ));
    }

    /**
     * Build per-day trend counts for Posts, Careers, and FAQs over the last N days.
     * Returns an array of days: [ { date, label, posts, careers, faqs }, ... ]
     */
    protected function buildTrendData(int $days): array
    {
        $start = now()->startOfDay()->subDays($days - 1);

        // Seed the timeline
        $timeline = [];
        for ($d = 0; $d < $days; $d++) {
            $date = $start->copy()->addDays($d);
            $timeline[$date->toDateString()] = [
                'date' => $date->toDateString(),
                'label' => $date->format('D'),
                'posts' => 0,
                'careers' => 0,
                'faqs' => 0,
            ];
        }

        $fill = function ($model, $key) use (&$timeline, $start) {
            $records = $model::query()
                ->selectRaw('DATE(updated_at) as d, COUNT(*) as c')
                ->where('updated_at', '>=', $start)
                ->groupBy('d')
                ->orderBy('d')
                ->pluck('c', 'd');
            foreach ($records as $d => $c) {
                if (isset($timeline[$d])) {
                    $timeline[$d][$key] = (int) $c;
                }
            }
        };

        $fill(BlogPost::class, 'posts');
        $fill(CareerPost::class, 'careers');
        $fill(Faq::class, 'faqs');

        return array_values($timeline);
    }
}
