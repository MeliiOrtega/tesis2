<?php

namespace Database\Factories;

use App\Models\Image;
use Illuminate\Database\Eloquent\Factories\Factory;

class ImageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Image::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'url' => 'activity/' . $this->faker->image('public/storage/activity', 640, 480, null, false),
           // 'imageable_id' => null,
           // 'imageable_type' => null,

            /* con true
            public/storage/cursos/image.jpg
            con false
            image.jpg
            */
        ];
    }
}
