<?php

namespace Database\Seeders;

use finfo;
use App\Models\Banner;
use App\Helpers\Helper;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\Storage;

class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET foreign_key_checks=0');
        Banner::truncate();
        DB::statement('SET foreign_key_checks=1');

        $finfo = new finfo(FILEINFO_MIME_TYPE);
        $file = new Filesystem;
        $file->cleanDirectory('storage/app/public/banners');
        Storage::disk('public')->makeDirectory('banners');

        $path = Helper::instance()->uploadImage('images/banners/1.png', 960, 450, 'banners/cost_');
        Banner::create([
            'order' => 1,
            'url' => 'http://infrastructuretransparency.org/',
            'image' => $path,
        ]);
        $path = Helper::instance()->uploadImage('images/banners/1.png', 960, 450, 'banners/cost_');
        Banner::create([
            'order' => 2,
            'image' => $path,
        ]);
        $path = Helper::instance()->uploadImage('images/banners/1.png', 960, 450, 'banners/cost_');
        Banner::create([
            'order' => 3,
            'image' => $path,
        ]);
    }
}
