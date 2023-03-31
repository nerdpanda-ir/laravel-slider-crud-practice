<?php

namespace App\Http\Controllers\Admin\Slider;

use App\Http\Controllers\Controller;
use App\Http\Requests\SliderStoreRequest;
use App\Models\Slider;
use App\Services\SliderThumbnailUploader;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class SliderStoreController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(SliderStoreRequest $request , Slider $slider)
    {
        $slider->title = $request->get('title');
        $slider->description = $request->get('description');
        $slider->description = $request->get('description');
        if($request->hasFile('thumbnial')){
            $uploaded = SliderThumbnailUploader::upload($request);
            $slider->thumbnail = $uploaded->getPathname();
        }
        $slider->is_active = $request->has('is_active');
        $slider->created_at = Carbon::now();
        $saved = $slider->Save();
        $messageKey = 'messages.fail';
        $message = "fail make slider";
        if ($saved){
            $messageKey = 'messages.ok';
            $message = "slider with id {$slider->id} has been successfuly Created";
        }
        return redirect()->route('admin.slider.home')->with($messageKey,[$message]);
    }
}
