<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::factory()
                    ->count(100)
                    ->hasPosts(rand(2,7))
                    ->make();

        $users->chunk(10)->each(function ($chunk) {
            DB::table('users')->insert($chunk->toArray());
        });
    }
}
