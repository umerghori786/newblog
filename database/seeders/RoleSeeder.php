<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;
use DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        //Role::factory()->count(4)->create();   // using factory;

        /*using db*/

        $roles = ['Admin','Author','User'];

        for ($i=0; $i < count($roles); $i++) { 
            DB::table('roles')->insert(['name'=>$roles[$i]]);
 
        }

        /*end*/
    }
}
