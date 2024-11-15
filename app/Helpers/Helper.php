<?php

namespace App\Helpers;

use Image;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Imagick\Driver;

class Helper
{
    public static function instance()
    {
        return new Helper;
    }

    public function uploadImage($image_path, $width, $height, $path_save)
    {
        $manager = new ImageManager(new Driver());
        $image = $manager->read(public_path($image_path));
        $path = $path_save . date('YmdHis') . round(microtime(true) * 1000) . '.jpg';
        $image->scaleDown($width, $height)->save(storage_path('app/public/') . $path);
        return $path;
    }
}
