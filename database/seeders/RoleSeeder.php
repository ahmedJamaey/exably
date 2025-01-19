<?php

namespace Database\Seeders;

use App\Enums\RoleEnum;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Role::factory(5)->create();

        foreach (RoleEnum::cases() as $role) {
            Role::create([
                'name' => 'ahmed',
                'slug' => $role->value,
            ]);
        }
    }

}
