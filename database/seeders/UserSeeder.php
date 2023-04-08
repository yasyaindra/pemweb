<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // User::factory()->times(20)->create();
        $timestamp = \Carbon\Carbon::now()->toDateTimeString();
        DB::table('users')->insert([
            'username'  => 'client',
            'password'  => Str::random(40),
            'created_at' => $timestamp,
            'updated_at' => $timestamp
        ]);
    }
}
