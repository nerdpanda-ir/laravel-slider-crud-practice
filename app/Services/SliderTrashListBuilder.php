<?php

namespace App\Services;

use App\Models\Slider;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class SliderTrashListBuilder extends SliderBuilder
{
    public function build(): Collection|LengthAwarePaginator
    {
        return $this->getSlider()
                ->onlyTrashed()
                ->latest('deleted_at')
                ->latest()
                ->latest('updated_at')
                ->paginate(12,[
                    'id' , 'thumbnail' , 'title' , 'description' ,
                    'is_active' , 'created_at' , 'updated_at' , 'deleted_at'
                ]);
    }
}
