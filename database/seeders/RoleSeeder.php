<?php

namespace Database\Seeders;

use App\Models\Backend\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            [
                'name' => 'admin',
                'slug' => 'admin',
            ],
            [
                'name' => 'viewer',
                'slug' => 'viewer',
            ],
            [
                'name' => 'editor',
                'slug' => 'editor',
            ]
            // Add more role here
        ];

        // Store the role in the database
        foreach ($roles as $role) {
            Role::create($role);
        }
    }
}
