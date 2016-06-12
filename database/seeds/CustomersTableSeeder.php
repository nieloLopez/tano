<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

use \Illuminate\Database\Seeder;

/**
 * Description of UserTableSeeder
 *
 * @author nielo
 */
class CustomersTableSeeder extends Seeder {
    public function run() {
        \DB::table('customers')->insert(array (
            'name' => 'Tano',
            'dni' => "33655666",
            'email' => "tano@gmail.com",
            'password' => \Hash::make('321321'),
            'birthday' => "1966-09-02",
            'address' => "guarda vieja 2121",
            'telephone' => "32132121",
            'fk_rol' => 1,
        ));
    }
}
 