<?php namespace App\Services; ?>
<?php

use App\Models\Slider;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class EditSliderBuilder extends SliderBuilder {

    public function build():Model|null{
        return $this->slider
                    ->withTrashed()
                    ->find(request()->id,[
                        'title' , 'description' , 'thumbnail' , 'is_active'
                    ]);
    }
}
