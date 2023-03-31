<?php namespace App\Services; ?>
<?php

use App\Models\Slider;
use Illuminate\Database\Eloquent\Collection;

class HomeSliderBuilder extends SliderBuilder {

    public function build():Collection{
        return $this->slider
                ->withoutTrashed()
                ->whereActiveIsTrue()
                ->latest()
                ->latest('updated_at')
                ->get(['title' , 'description' , 'thumbnail']);
    }
}
