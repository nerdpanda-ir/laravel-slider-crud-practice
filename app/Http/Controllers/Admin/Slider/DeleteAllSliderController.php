<?php

namespace App\Http\Controllers\Admin\Slider;

use App\Http\Controllers\Controller;
use App\Services\DeleteAllSliderBuilder;
use App\Services\SliderThumbnailRemover;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class DeleteAllSliderController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(DeleteAllSliderBuilder $builder)
    {
        $query = $builder->build();
        $thumbnails = $query->get(['thumbnail']);
        $deleted = $query->forceDelete();
        $messageKey = 'messages.ok';
        $message = $deleted.' slides successfully deleted !!!';
        if (!($deleted>0))
            return redirect()->route('admin.slider.home')->with($messageKey,[$message]);
        foreach ($thumbnails->all() as $thumbnail)
            if (!is_null($thumbnail->thumbnail))
                SliderThumbnailRemover::remove($thumbnail->thumbnail);
        return redirect()->route('admin.slider.home')->with($messageKey,[$message]);
    }
}
