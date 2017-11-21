<?php

use Illuminate\Database\Seeder;
use App\Entities\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'cpf'       => '12341111111',
            'name'      => 'Reubert',
            'phone'     => '973494545',
            'birth'     => '1996-08-17',
            'gender'    => 'M',
            'email'     => 'reubert@yahoo.com',
            'password'  => env('PASSWORD_HASH') ? bcrypt('123456') : '123456',
        ]);
    }
}
