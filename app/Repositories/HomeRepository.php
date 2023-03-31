<?php

namespace App\Repositories;

use App\Services\HomeSliderBuilder;

class HomeRepository extends Repository
{
    protected HomeSliderBuilder $homeSliderBuilder;
    public function __construct(HomeSliderBuilder $homeSliderBuilder)
    {
        $this->homeSliderBuilder = $homeSliderBuilder;
    }
    public function getData():array {
        $slides = $this->getHomeSliderBuilder()->build();
        return compact('slides');
    }
    /**
     * @return HomeSliderBuilder
     */
    public function getHomeSliderBuilder(): HomeSliderBuilder
    {
        return $this->homeSliderBuilder;
    }

    /**
     * @param HomeSliderBuilder $homeSliderBuilder
     */
    public function setHomeSliderBuilder(HomeSliderBuilder $homeSliderBuilder): void
    {
        $this->homeSliderBuilder = $homeSliderBuilder;
    }

}
