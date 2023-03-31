<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Model;

class UpdateSliderBuilder extends SliderBuilder
{
    public function build():Model|null
    {
        return $this->slider->withTrashed()->find(request()->id,['id','thumbnail']);
    }
}
