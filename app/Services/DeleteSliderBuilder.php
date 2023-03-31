<?php

namespace App\Services;

class DeleteSliderBuilder extends SliderBuilder
{
    public function build()
    {
        return $this->slider->withTrashed()->find(request()->id,['id','thumbnail']);
    }
}
