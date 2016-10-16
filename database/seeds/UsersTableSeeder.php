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
    $user = new User;
    $user->name     = 'John Doe';
    $user->email    = 'john@example.com';
    $user->password = bcrypt('secret');
    $user->save();
  }
}
