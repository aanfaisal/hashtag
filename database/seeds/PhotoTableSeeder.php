<?php

use Illuminate\Database\Seeder;

class PhotoTableSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        //ngosongin tabel
        DB::table('photos')->delete();

        //bikin data dulu dalam array untuk dimasukkin kedatabase
        $post = array(
            array('photo_id' => 1, 'foto' => 'image.png', 'printed' => 'sudah'),
        );

        //masukkan data array ke database
        DB::table('photos')->insert($post);
    }
}
