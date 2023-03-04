<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class DummySeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tindakan')->insert([
            'id' => Str::random(36),
            'nm_tindakan' => Str::random(10),
            'ket' => Str::random(10),
        ]);
    }
}
