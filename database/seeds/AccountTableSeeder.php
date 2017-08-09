<?php

use Illuminate\Database\Seeder;

class AccountTableSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        //ngosongin tabel
        DB::table('accounts')->delete();

        //bikin data dulu dalam array untuk dimasukkin kedatabase
        $post = array(
            array('insta_id' => 1, 'email' => 'andrewi.jaya@gmail.com', 'password' => 'm3t4l1c4', 'hashtag' => 'ikitasku'),
        );

        //masukkan data array ke database
        DB::table('accounts')->insert($post);
    }
}
