<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@admin.fr',
            'email_verified_at' => now(),
            'password' => Hash::make('admin'), // crypté le mdp.
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
