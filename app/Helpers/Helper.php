<?php

namespace App\Helpers;

use Intervention\Image\Facades\Image;

class Helper
{
    public static function instance()
    {
        return new Helper();
    }

    public function uploadImage($image_path, $width, $height, $path_save)
    {
        $image = Image::make(public_path($image_path));
        $path = $path_save . date('YmdHis') . round(microtime(true) * 1000) . '.jpg';
        $image->fit($width, $height, function($constraint){
            $constraint->upsize();
        })->save(storage_path('app/public/') . $path);
        return $path;
    }
}