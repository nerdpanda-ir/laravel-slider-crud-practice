<?php

namespace App\Repositories;

use App\Services\EditSliderBuilder;
use App\Services\HomeSliderBuilder;

class SliderEditRepository extends Repository
{
    protected EditSliderBuilder $editSliderBuilder;
    public function __construct(EditSliderBuilder $editSliderBuilder)
    {
        $this->editSliderBuilder = $editSliderBuilder;
    }
    public function getData():array {
        $slide = $this->getEditSliderBuilder()->build();
        $title = 'edit slider';
        return compact('slide','title');
    }

    /**
     * @return EditSliderBuilder
     */
    public function getEditSliderBuilder(): EditSliderBuilder
    {
        return $this->editSliderBuilder;
    }

    /**
     * @param EditSliderBuilder $editSliderBuilder
     */
    public function setEditSliderBuilder(EditSliderBuilder $editSliderBuilder): void
    {
        $this->editSliderBuilder = $editSliderBuilder;
    }


}
