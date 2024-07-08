<?php

namespace Database\Seeders;

use App\Models\Blood;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BloodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $bloods = [
            [
                'id'=>1,
                'name'=>'A+',
            ],
            [
                'id'=>2,
                'name'=>'A-',
            ],
            [
                'id'=>3,
                'name'=>'Ab+',
            ],
            [
                'id'=>4,
                'name'=>'Ab-',
            ],
            [
                'id'=>5,
                'name'=>'B+',
            ],
            [
                'id'=>6,
                'name'=>'B-',
            ],

        ];

        foreach($bloods as $role){
            Blood::create($role);
        }
    }
}
