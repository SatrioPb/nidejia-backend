<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Listing;
use App\Models\Transaction;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\Sequence;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create admin user
        User::factory()->create([
            'name' => 'admin nidejia',
            'email' => 'admin@gmail.com',
            'role' => 'admin',
        ]);

        // Create 10 regular users
        $users = User::factory(10)->create();

        // Create 10 listings
        $listings = Listing::factory(10)->create();

        // Create 10 transactions with random user and listing IDs
        Transaction::factory(10)->state(
            new Sequence(
                fn() => [
                    'user_id' => $users->random()->id,
                    'listing_id' => $listings->random()->id,
                ]
            )
        )->create();
    }
}
