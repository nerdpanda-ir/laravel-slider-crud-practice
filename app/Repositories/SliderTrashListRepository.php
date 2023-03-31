<?php

namespace App\Repositories;

use App\Services\SliderTrashListBuilder;

class SliderTrashListRepository extends Repository
{
    protected SliderTrashListBuilder $sliderTrashListBuilder;
    public function __construct(SliderTrashListBuilder $sliderTrashListBuilder)
    {
        $this->sliderTrashListBuilder = $sliderTrashListBuilder;
    }
    public function getData(): array
    {
        $slides = $this->getSliderTrashListBuilder()->build();
        $title = 'list of trash slides';
        return compact('slides','title');
    }

    /**
     * @return SliderTrashListBuilder
     */
    public function getSliderTrashListBuilder(): SliderTrashListBuilder
    {
        return $this->sliderTrashListBuilder;
    }

    /**
     * @param SliderTrashListBuilder $sliderTrashListBuilder
     */
    public function setSliderTrashListBuilder(SliderTrashListBuilder $sliderTrashListBuilder): void
    {
        $this->sliderTrashListBuilder = $sliderTrashListBuilder;
    }



}
