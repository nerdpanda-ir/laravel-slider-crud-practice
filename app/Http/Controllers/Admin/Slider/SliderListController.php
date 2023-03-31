<?php

namespace App\Http\Controllers\Admin\Slider;

use App\Http\Controllers\Controller;
use App\Repositories\SliderIndexRepository;
use App\Services\SliderListBuilder;
use Illuminate\Http\Request;

class SliderListController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(SliderIndexRepository $indexRepository)
    {
        return view('pages.admin.slider.list',$indexRepository->getData());
    }
}
