<?php

namespace Database\Seeders;

use App\Models\State;
use App\Models\Branch;
use Illuminate\Database\Seeder;

class BranchLocationSeeder extends Seeder
{
    /**
     * Run the database seeder.
     */
    public function run(): void
    {
        // Create Lagos state
        $lagos = State::create([
            'name' => 'Lagos',
            'slug' => 'lagos',
            'order' => 1,
            'is_active' => true,
        ]);

        // Create Lagos branches
        Branch::create([
            'state_id' => $lagos->id,
            'name' => 'Lagos (Headquarters)',
            'address' => 'No. 4, Bashiru Olusesi Street, off Conservation Road, Lekki Phase 2, Lagos State.',
            'email' => 'hello@dgnravepay.com',
            'whatsapp' => '+234 9160006956',
            'phone' => '+234 2013306189',
            'order' => 1,
            'is_active' => true,
        ]);

        Branch::create([
            'state_id' => $lagos->id,
            'name' => 'Kings Plaza',
            'address' => 'No 80, Adeniran Ogunsanya Street, Surulere, Lagos State.',
            'email' => 'aria@dgnravepay.com',
            'whatsapp' => '+234 9160005387',
            'phone' => '+234 2013306026',
            'order' => 2,
            'is_active' => true,
        ]);

        // Create Abakaliki state
        $abakaliki = State::create([
            'name' => 'Abakaliki',
            'slug' => 'abakaliki',
            'order' => 2,
            'is_active' => true,
        ]);

        // Create Abakaliki branch
        Branch::create([
            'state_id' => $abakaliki->id,
            'name' => 'Abakaliki',
            'address' => 'No. 1, Leach Road, off Waterworks Road, by Fire Service Abakaliki, Ebonyi State.',
            'email' => 'amelia@dgnravepay.com',
            'whatsapp' => '+234 9160006954',
            'phone' => '+234 2013306103',
            'order' => 1,
            'is_active' => true,
        ]);

        $this->command->info('Branch locations seeded successfully!');
    }
}
