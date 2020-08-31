<?php

use Illuminate\Database\Seeder;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->delete();
        $adminRecords= [
        	['id'=>1,'name'=>'admin', 'type'=>'admin','mobile'=>'123456', 'email'=>'admin@admin.com', 'password'=>'$2y$10$.br1dGI/3yNfAgpvN8yheOZUSAe7IIvHHZeQ7qnv5xiTiO34o0DBi', 'image'=>'','status'=>1
        	],

            ['id'=>2,'name'=>'John', 'type'=>'subadmin','mobile'=>'123456', 'email'=>'john@admin.com', 'password'=>'$2y$10$.br1dGI/3yNfAgpvN8yheOZUSAe7IIvHHZeQ7qnv5xiTiO34o0DBi', 'image'=>'','status'=>1
            ],

            ['id'=>3,'name'=>'Steve', 'type'=>'subadmin','mobile'=>'123456', 'email'=>'steve@admin.com', 'password'=>'$2y$10$.br1dGI/3yNfAgpvN8yheOZUSAe7IIvHHZeQ7qnv5xiTiO34o0DBi', 'image'=>'','status'=>1
            ],

            ['id'=>4,'name'=>'Martin', 'type'=>'subadmin','mobile'=>'123456', 'email'=>'martin@admin.com', 'password'=>'$2y$10$.br1dGI/3yNfAgpvN8yheOZUSAe7IIvHHZeQ7qnv5xiTiO34o0DBi', 'image'=>'','status'=>1
            ],
        ];


        DB::table('admins')->insert($adminRecords);
        
    }
}
