<?php

namespace App\Services;

use App\Models\Slider;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

abstract class SliderBuilder
{
    protected Slider $slider;
    public function __construct(Slider $slider)
    {
        $this->slider = $slider;
    }

    public abstract function build();

    public function getSlider():Slider {
        return $this->slider;
    }
    public function setSlider(Slider $slider){
        $this->slider = $slider;
    }
}
