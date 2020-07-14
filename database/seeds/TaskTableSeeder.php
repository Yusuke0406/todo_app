<?php

use Illuminate\Database\Seeder;

class TaskTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('task')->delete();

        Task::create([
            'content' => 'aaa', 'user_id' =>1,'category_id' =1,'due_date' => 1229,'completed'=>1;
        ])
    }
}
