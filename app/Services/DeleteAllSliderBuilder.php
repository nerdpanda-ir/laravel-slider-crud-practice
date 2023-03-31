<?php

namespace App\Services;

class DeleteAllSliderBuilder extends SliderBuilder
{
    public function build()
    {
        return $this->slider->withoutTrashed();
    }
}
