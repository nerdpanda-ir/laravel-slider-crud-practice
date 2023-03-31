<?php

namespace App\Http\Controllers\Admin\Slider;

use App\Http\Controllers\Controller;
use App\Http\Requests\SliderUpdateRequest;
use App\Services\SliderThumbnailRemover;
use App\Services\SliderThumbnailUploader;
use App\Services\UpdateSliderBuilder;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SliderUpdateController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(SliderUpdateRequest $request, UpdateSliderBuilder $updateSliderBuilder ,int $id)
    {
        $slide = $updateSliderBuilder->build();
        if (is_null($slide))
            abort(404);
        $hasThumbnail = $request->hasFile('thumbnial');
        $slide->title = $request->title;
        $slide->description = $request->description ;
        $slide->is_active = $request->has('is_active');

        if ($hasThumbnail) {
            if(!is_null($slide->thumbnail))
                $oldTumbnail = $slide->thumbnail;
            $moved  = SliderThumbnailUploader::upload($request);
            $slide->thumbnail = $moved->getPathname();
        }
        $slide->updated_at = Carbon::now();
        $updated = $slide->update();

        if ($updated and isset($oldTumbnail))
            SliderThumbnailRemover::remove($oldTumbnail);

        $messageKey = 'messages.ok';
        $message = "slider with id $id has been successfuly updated";
        if (!$updated){
            $messageKey = 'messages.fail';
            $message = "slider with id $id no updated";
        }
        return redirect()->route('admin.slider.home')->with($messageKey,[$message]);
    }
}
