<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    use HasFactory;

    protected $fillable = [
        'question', 'answer', 'is_published', 'page'
    ];

    public const PAGES = [
        'home' => 'Home',
        'loan' => 'Loan',
        'pos' => 'POS',
        'virtual' => 'Virtual Card',
        'savings' => 'Savings',
        'travel' => 'Travel',
        'payroll' => 'Payroll',
        'business' => 'Business',
        'invoice' => 'Invoice',
        'business-management' => 'Business Management',
    ];
}
