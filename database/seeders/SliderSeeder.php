<?php

namespace Database\Seeders;

use Database\Factories\SliderFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SliderSeeder extends Seeder
{
    protected static int $count = 50 ;
    /**
     * Run the database seeds.
     */
    public function run(SliderFactory $sliderFactory): void
    {
        $sliderFactory->modelName()::truncate();
        $sliderFactory->fullData()->count(3)->create();
        $sliderFactory->count(self::$count)->create();
        $sliderFactory->fullData()->count(3)->create();
    }
}
