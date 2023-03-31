<?php

namespace App\Repositories;

use App\Services\SliderListBuilder;

class SliderIndexRepository extends Repository
{
    protected SliderListBuilder $sliderListBuilder;
    public function __construct(SliderListBuilder $sliderListBuilder)
    {
        $this->sliderListBuilder = $sliderListBuilder;
    }
    public function getData(): array
    {
        $slides = $this->getSliderListBuilder()->build();

        $title = 'list of slides';
        return compact('slides','title');
    }

    /**
     * @return SliderListBuilder
     */
    public function getSliderListBuilder(): SliderListBuilder
    {
        return $this->sliderListBuilder;
    }

    /**
     * @param SliderListBuilder $sliderListBuilder
     */
    public function setSliderListBuilder(SliderListBuilder $sliderListBuilder): void
    {
        $this->sliderListBuilder = $sliderListBuilder;
    }

}
