<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class JabatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
 
    	for($i = 1; $i <= 30; $i++){
 
    	      // insert data ke table pegawai menggunakan Faker
    		DB::table('jabatan')->insert([
    			'nama_jabatan' => $faker->jobTitle(100, 200),
    		]);
 
    	}
    }
}
