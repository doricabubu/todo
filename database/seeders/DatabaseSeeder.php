<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // users
        DB::table('users')->insert([
            'username' => 'dora',
            'password' => 'doravoliacu',
            'created_at' => '2021-04-11 18:13:28',
            'updated_at' => '2021-04-11 18:13:28',
        ]);
        DB::table('users')->insert([
            'username' => 'aca',
            'password' => 'acavolidoru',
            'created_at' => '2021-04-11 18:13:28',
            'updated_at' => '2021-04-11 18:13:28',
        ]);

        // todo_items
        DB::table('todo_items')->insert([
            'content' => 'Pojedi hobotnicu',
            'done' => FALSE,
            'username' => 'dora',
            'created_at' => '2021-04-11 18:13:28',
            'updated_at' => '2021-04-11 18:13:28',
        ]);
        DB::table('todo_items')->insert([
            'content' => 'Team building',
            'done' => FALSE,
            'username' => 'dora',
            'created_at' => '2021-04-11 18:13:28',
            'updated_at' => '2021-04-11 18:13:28',
        ]);
        DB::table('todo_items')->insert([
            'content' => 'Polozi osnove',
            'done' => TRUE,
            'username' => 'dora',
            'created_at' => '2021-04-11 18:13:28',
            'updated_at' => '2021-04-11 18:13:28',
        ]);

        DB::table('todo_items')->insert([
            'content' => 'Zagrli doru 11/04/2021',
            'done' => FALSE,
            'username' => 'aca',
            'created_at' => '2021-04-11 18:13:28',
            'updated_at' => '2021-04-11 18:13:28',
        ]);
        DB::table('todo_items')->insert([
            'content' => 'Zagrli doru 10/04/2021',
            'done' => TRUE,
            'username' => 'aca',
            'created_at' => '2021-04-11 18:13:28',
            'updated_at' => '2021-04-11 18:13:28',
        ]);
        DB::table('todo_items')->insert([
            'content' => 'Zagrli doru 09/04/2021',
            'done' => TRUE,
            'username' => 'aca',
            'created_at' => '2021-04-11 18:13:28',
            'updated_at' => '2021-04-11 18:13:28',
        ]);
        DB::table('todo_items')->insert([
            'content' => 'Zagrli doru 08/04/2021',
            'done' => TRUE,
            'username' => 'aca',
            'created_at' => '2021-04-11 18:13:28',
            'updated_at' => '2021-04-11 18:13:28',
        ]);
        DB::table('todo_items')->insert([
            'content' => 'Mesecnica',
            'done' => TRUE,
            'username' => 'aca',
            'created_at' => '2021-04-11 18:13:28',
            'updated_at' => '2021-04-11 18:13:28',
        ]);
    }
}
