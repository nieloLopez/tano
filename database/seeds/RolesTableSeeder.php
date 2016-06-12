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
class RolesTableSeeder extends Seeder {
    public function run() {
        /*\DB::table('roles')->insert(array (
            'name' => 'SuperAdmin'
        ));*/
        \DB::table('roles')->insert(array (
            'name' => 'Admin'
        ));
        \DB::table('roles')->insert(array (
            'name' => 'Customer'
        ));
    }
}

 