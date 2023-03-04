<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        Role::query()->insert($this->generator());
    }

    private function generator(): array
    {
        $roles = collect([]);
        $now = now();

        foreach (Role::ROLES as $role) {
            $roles->push([
                'name' => $role,
                'created_at' => $now,
                'updated_at' => $now,
            ]);
        }

        return $roles->toArray();
    }
}
