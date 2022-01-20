<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class People2TableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $param = [
            'name' => 'taro',
            'mail' => 'taro@mail',
            'age' => 12,
        ];
        DB::table('people2')->insert($param);

        $param = [
            'name' => 'yama',
            'mail' => 'yama@mail',
            'age' => 22,
        ];
        DB::table('people2')->insert($param);

        $param = [
            'name' => 'sawa',
            'mail' => 'sawa@mail',
            'age' => 32,
        ];
        DB::table('people2')->insert($param);
    }
}
