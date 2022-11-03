<?php

use Illuminate\Database\Seeder;

use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
 
    	for($i = 1; $i <= 20; $i++){
 
    	      // insert data ke table pegawai menggunakan Faker
    		DB::table('users')->insert([
    			'nip' => $faker->numberBetween(300, 500),
    			'name' => $faker->name,
    			'email' => $faker->email,
    			'password' => bcrypt('12345'),
    			'token' => $faker->numberBetween(100, 200),
    			'telepon' => $faker->numberBetween(10000, 99999),
    			'jabatan_id' => $faker->numberBetween(1, 20),
    			'alamat' => $faker->address,
    			'role' => 'admin',
    			'remember_token' => Str::random(60),
    		]);
 
    	}
    }
}
