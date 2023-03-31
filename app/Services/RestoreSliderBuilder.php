<?php

namespace App\Services;

class RestoreSliderBuilder extends SliderBuilder
{
    public function build()
    {
        return $this->slider->onlyTrashed()->find(request()->id,'id');
    }
}
