<?php

namespace App\Services;

class TrashSliderBuilder extends SliderBuilder
{
    public function build()
    {
        return $this->slider->find(request()->id,'id');
    }
}
