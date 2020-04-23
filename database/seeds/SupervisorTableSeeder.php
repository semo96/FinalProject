<?php

use Illuminate\Database\Seeder;

class SupervisorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $supervisor = [

            [

                'sup_first_name'=>'omer',
                'sup_last_name'=>'alqutwi',
                'username'=>'oasq',
                'password'=>bcrypt('123456'),
                //'email'=>'pro.oasq@gmail.com',
                'sup_status'=>'1',
                'is_admin'=>'1',

            ],

            [

                'sup_first_name'=>'osamah',
                'sup_last_name'=>'greed',
                'username'=>'os',
                'password'=>bcrypt('123456'),
               // 'email'=>'os@gmail.com',
                'sup_status'=>'1',
                'is_admin'=>'0',


            ],

        ];
        foreach ( $supervisor as $Key=>$value)
        {
            \App\Supervisor::create($value);
        }
    }
}
