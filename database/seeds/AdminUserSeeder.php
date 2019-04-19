<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Super Admin',
            'username' => 'Admin',
            'email' => 'admin@mail.net',
            'password' => bcrypt(123456)
        ]);
        $user->assignRole('Admin');
    }
}
