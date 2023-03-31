<?php

namespace App\Services;

use App\Models\Slider;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class SliderListBuilder extends SliderBuilder
{
    public function build(): Collection|LengthAwarePaginator
    {
        return $this->getSlider()
                ->latest()
                ->latest('updated_at')
                ->paginate(12,[
                    'id' , 'thumbnail' , 'title' , 'description' ,
                    'is_active' , 'created_at' , 'updated_at'
                ]);
    }
}
