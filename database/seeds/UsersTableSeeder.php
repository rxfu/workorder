<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create(
            [
            'username'          => 'admin',
            'realname'          => '技术部客服',
            'email'             => 'test@gxnu.edu.cn',
            'email_verified_at' => now(),
            'password'          => 'secret', //'$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token'    => str_random(10),
            ]
        );
    }
}
