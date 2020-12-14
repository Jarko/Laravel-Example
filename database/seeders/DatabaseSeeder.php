<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\Sequence;

use App\Models\User;
use App\Models\Team;
use App\Models\Phone;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run() {
    	Team::truncate();
    	User::truncate();

        Team::factory()
            ->count(3)
            ->state(new Sequence(
                ['name' => 'Udvikling'],
                ['name' => 'Grafik'],
                ['name' => 'Finans'],
            ))
            ->has(User::factory()
            	->count(3)
            	->has(Phone::factory())
            )
            ->create();
    }
}
