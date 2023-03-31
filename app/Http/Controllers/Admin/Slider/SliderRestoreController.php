<?php

namespace App\Http\Controllers\Admin\Slider;

use App\Http\Controllers\Controller;
use App\Services\RestoreSliderBuilder;
use Illuminate\Http\Request;

class SliderRestoreController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(int $id , Request $request , RestoreSliderBuilder $builder)
    {
        $slide = $builder->build();
        if (is_null($slide))
            abort(404);
        $restored = $slide->restore();
        $messageKey = 'messages.ok';
        $message = "slider with id $id has been successfuly restored from trash ";
        if (!$restored){
            $messageKey = 'messages.fail';
            $message = "slider with id $id no restore from trash";
        }
        return redirect()->route('admin.slider.trash-list')->with($messageKey,[$message]);
    }
}
