<?php

namespace App\Http\Controllers\Admin\Slider;

use App\Http\Controllers\Controller;
use App\Services\DeleteSliderBuilder;
use App\Services\SliderThumbnailRemover;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SliderDeleteController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request,int $id , DeleteSliderBuilder $builder)
    {
        $slide = $builder->build();
        if (is_null($slide))
            abort(404);
        $deleted = $slide->forceDelete();

        if ($deleted and !is_null($slide->thumbnail))
            SliderThumbnailRemover::remove($slide->thumbnail);

        $messageKey = 'messages.ok';
        $message = "slider with id $id has been successfuly Delete";
        if (!$deleted){
            $messageKey = 'messages.fail';
            $message = "slider with id $id no delete";
        }
        return back()->with($messageKey,[$message]);
    }
}
