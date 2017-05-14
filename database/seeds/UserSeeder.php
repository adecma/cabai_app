<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $u = new User;
        $u->name = 'Ade Prast';
        $u->email = 'adecma18@gmail.com';
        $u->password = bcrypt('rahasia');
        $u->save();
    }
}
