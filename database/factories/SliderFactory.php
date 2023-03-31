<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Slider>
 */
class SliderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $created_at = $this->get_created_at();
        $forward_created_at = $this->forward_DateTime($created_at);
        $updated_at = $this->get_updated_at($forward_created_at);
        $deleted_at = $this->get_deleted_at($forward_created_at) ;
        return [
            'title' => $this->get_title() ,
            'description' => $this->get_description() ,
            'thumbnail' => $this->get_thumbnail() ,
            'is_active'=> $this->faker->boolean ,
            'created_at' => $created_at,
            'updated_at' => $updated_at,
            'deleted_at' => $deleted_at,
        ];
    }
    protected function get_title():null|string {
        if ($this->faker->boolean)
            return null;
        return $this->faker->words(6,true);
    }
    protected function get_description():null|string {
        if ($this->faker->boolean)
            return null;
        return $this->faker->paragraph(rand(1,3));
    }
    protected function get_thumbnail():null|string {
        if ($this->faker->boolean)
            return null;
        return $this->faker->imageUrl();
    }
    protected function get_created_at():\DateTime {
        return $this->faker->dateTimeBetween('-6 years');
    }
    protected function forward_DateTime(\DateTime $dateTime , int $min = 120 , int $max = 3600){
        $forward_dateTime_timestamp = $dateTime->getTimestamp() + rand($min,$max);
        return (new \DateTime())->setTimestamp($forward_dateTime_timestamp);
    }
    protected function get_updated_at(\DateTime $from):null|\DateTime {
        if ($this->faker->boolean)
            return null;
        return $this->faker->dateTimeBetween($from);
    }
    protected function get_deleted_at(\DateTime $from):null|\DateTime {
        if ($this->faker->boolean)
            return null;
        return $this->faker->dateTimeBetween($from);
    }
    public function fullData():self{
        return $this->state(function (){
            return [
                'title' =>  $this->faker->words(6,true) ,
                'description' => $this->faker->paragraph(rand(1,3)) ,
                'thumbnail' => $this->faker->imageUrl(),
            ];
        });
    }
}
