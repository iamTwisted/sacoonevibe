<?php

namespace Database\Seeders;

use App\Models\Branch;
use Illuminate\Database\Seeder;

class BranchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Branch::create([
            'code' => 'BR001',
            'name' => 'Main Branch',
            'address' => '123 Main St, Anytown, USA',
            'phone' => '555-1234',
        ]);

        Branch::create([
            'code' => 'BR002',
            'name' => 'Downtown Branch',
            'address' => '456 Oak Ave, Anytown, USA',
            'phone' => '555-5678',
        ]);

        Branch::create([
            'code' => 'BR003',
            'name' => 'Westside Branch',
            'address' => '789 Pine Ln, Anytown, USA',
            'phone' => '555-9012',
        ]);

        Branch::create([
            'code' => 'BR004',
            'name' => 'Eastside Branch',
            'address' => '101 Maple Dr, Anytown, USA',
            'phone' => '555-3456',
        ]);

        Branch::create([
            'code' => 'BR005',
            'name' => 'Southside Branch',
            'address' => '212 Birch Rd, Anytown, USA',
            'phone' => '555-7890',
        ]);
    }
}
