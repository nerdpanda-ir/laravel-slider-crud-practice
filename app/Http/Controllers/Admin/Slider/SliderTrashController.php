<?php

namespace App\Http\Controllers\Admin\Slider;

use App\Http\Controllers\Controller;
use App\Services\TrashSliderBuilder;
use Illuminate\Http\Request;

class SliderTrashController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke( int $id, Request $request , TrashSliderBuilder $builder)
    {
        $slider = $builder->build();
        if (is_null($slider))
            abort(404);
        $deleted = $slider->delete();
        $messageKey = 'messages.ok';
        $message = "slider with id $id has been successfuly moved to trash";
        if (!$deleted){
            $messageKey = 'messages.fail';
            $message = "slider with id $id no moved to trash";
        }
        return back()->with($messageKey,[$message]);
    }
}
