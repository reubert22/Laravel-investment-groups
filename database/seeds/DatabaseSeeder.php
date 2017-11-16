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
            'cpf'       => '11111111111',
            'name'      => 'Reubert',
            'phone'     => '973494545',
            'birth'     => '1996-08-17',
            'gender'    => 'M',
            'notes'     => '',
            'email'     => 'reubert@reubert.com',
            'password'  => bcrypt('123456'),
        ]);
        // $this->call(UsersTableSeeder::class);
    }
}
