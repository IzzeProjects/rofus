<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class MembersImagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->copyFiles();

        DB::table('members_images')->insert([
            'name' => Str::random(20),
            'image' => '/storage/photos/shares/1xwpeKiT7Dg.jpg',
            'member_id' => 10
        ]);
        DB::table('members_images')->insert([
            'name' => Str::random(20),
            'image' => '/storage/photos/shares/9aNac6I-luE.jpg',
            'member_id' => 10
        ]);
        DB::table('members_images')->insert([
            'name' => Str::random(20),
            'image' => '/storage/photos/shares/c05R77j11Gw.jpg',
            'member_id' => 10
        ]);
        DB::table('members_images')->insert([
            'name' => Str::random(20),
            'image' => '/storage/photos/shares/fPfCIHiUE9c.jpg',
            'member_id' => 10
        ]);
        DB::table('members_images')->insert([
            'name' => Str::random(20),
            'image' => '/storage/photos/shares/O2kIUWBoj1Q.jpg',
            'member_id' => 10
        ]);
        DB::table('members_images')->insert([
            'name' => Str::random(20),
            'image' => '/storage/photos/shares/O8EvhDPChWw.jpg',
            'member_id' => 10
        ]);
    }

    private function copyFiles() {
        @mkdir('storage/app/public/photos');
        @mkdir('storage/app/public/photos/shares');

        $this->recurseCopy('temp', 'storage/app/public/photos/shares');
    }

    private function recurseCopy($src,$dst) {
        $dir = opendir($src);
        @mkdir($dst);
        while(false !== ( $file = readdir($dir)) ) {
            if (( $file != '.' ) && ( $file != '..' )) {
                if ( is_dir($src . '/' . $file) ) {
                    $this->recurseCopy($src . '/' . $file,$dst . '/' . $file);
                }
                else {
                    copy($src . '/' . $file,$dst . '/' . $file);
                }
            }
        }
        closedir($dir);
    }
}
