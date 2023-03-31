<?php

namespace App\Services;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\File\File;
class SliderThumbnailUploader
{
    public static function upload(Request $request):File {
        $thumbnail = $request->file('thumbnial');
        $slidesPath = public_path('img/slides');
        $uniqueHash = sha1(microtime());
        $uniqueDirName = substr($uniqueHash,0,12);
        $slidePath = $slidesPath.'/'.$uniqueDirName;
        $originalFileName = $thumbnail->getClientOriginalName();
        return $thumbnail->move('img/slides/'.$uniqueDirName,$originalFileName);
    }
}
