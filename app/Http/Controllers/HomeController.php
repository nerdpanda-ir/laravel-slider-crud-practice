<?php

namespace App\Http\Controllers;
use App\Models\Slider;
use App\Repositories\HomeRepository;
use Illuminate\Contracts\View\View;
class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(HomeRepository $homeRepository):View
    {
        return  \view('pages.home' ,$homeRepository->getData());
    }
}
