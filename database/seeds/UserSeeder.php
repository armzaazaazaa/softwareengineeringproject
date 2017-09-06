<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $admin = new\App\Models\User();
      $admin->name = "Adnim";
      $admin->email = "admin@admin.com";
      $admin->password = Hash::make('adnim');
      $admin->save();
    }
}
