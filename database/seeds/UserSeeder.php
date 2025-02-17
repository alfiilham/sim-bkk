<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Hash;
use carbon\carbon;
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
         db::table('users')->insert([
        'username'=>'admin',
        'email'=>'adminbkk@gmail.com',
        'name'=> 'admin',
        'password'=> Hash::make('admin12345'),
        'role'=>'admin',
        'foto'=>'admin.jpg',
        'email_verified_at' => Carbon::now(),
        ]);
        for($i = 1; $i <= 10; $i++){
            db::table('users')->insert([
                'name'=> $faker->name(),
                'username'=> '1170'. (6000+$i),
                'email'=> null,
                'password'=> Hash::make( '1170'. (6000+$i) ) ,
                'role'=>'alumni',
                'foto'=>'default.png'
                ]);
        }
        for($a = 2; $a <= 10; $a++){
            $data = db::table('instansis')->select('nama')->where('id',$a)->get();
            foreach($data as $nama){}
            $lowername = strtolower($nama->nama);
            $result = preg_replace("/[^a-zA-Z]/", "", $lowername);
            $nospasi = str_replace(' ', '', $result);
            db::table('users')->insert([
                'name'=> $nama->nama,
                'username'=> $nospasi,
                'email'=> null,
                'password'=> Hash::make($nospasi),
                'role'=>'instansi',
                'foto'=>'default.png'
                ]);
        }

    }
}
