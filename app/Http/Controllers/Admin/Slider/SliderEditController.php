<?php

namespace App\Http\Controllers\Admin\Slider;

use App\Http\Controllers\Controller;
use App\Repositories\SliderEditRepository;
use Illuminate\Http\Request;

class SliderEditController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(SliderEditRepository $editRepository, int $id)
    {
        $data = $editRepository->getData();
        if (is_null($data['slide']))
            abort(404);
        return view('pages.admin.slider.edit',$data);
    }
}
