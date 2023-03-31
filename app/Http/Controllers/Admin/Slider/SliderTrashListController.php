<?php

namespace App\Http\Controllers\Admin\Slider;

use App\Http\Controllers\Controller;
use App\Repositories\SliderTrashListRepository;
use Illuminate\Http\Request;

class SliderTrashListController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request,SliderTrashListRepository $sliderTrashListRepository)
    {
        return view('pages.admin.slider.trash-list',$sliderTrashListRepository->getData());
    }
}
