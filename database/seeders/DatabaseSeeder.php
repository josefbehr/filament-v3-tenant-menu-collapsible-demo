<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $user = User::factory()->create([
            'email' => 'user@example.com',
            'password' => Hash::make('user'),
        ]);

        $tenant_1 = \App\Models\Tenant::factory()->create([
            'name' => 'Demo Tenant 1',
        ]);
        $tenant_1->users()->attach($user);

        $tenant_2 = \App\Models\Tenant::factory()->create([
            'name' => 'Demo Tenant 2',
        ]);
        $tenant_2->users()->attach($user);
    }
}
