<?php

namespace App\Services;

use Illuminate\Support\Facades\File;

class SliderThumbnailRemover
{
    public static function remove (string $thumbnail){
        $thumbnailDirectory = pathinfo($thumbnail,PATHINFO_DIRNAME);
        File::deleteDirectory($thumbnailDirectory);
    }
}
