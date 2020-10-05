<?php

use App\Agency;
use Illuminate\Database\Seeder;

class AgencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement("SET foreign_key_checks=0");
        Agency::truncate();
        DB::statement("SET foreign_key_checks=1");

        Agency::create([
            'name' => 'PUTR',
            'full_name' => 'Dinas Pekerjaan Umum dan Penataan Ruang',
        ]);
    }
}
