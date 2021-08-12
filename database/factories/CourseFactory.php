<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Course;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
class CourseFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Course::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        //Hola mundo
        //con slug hola_mundo

        $title = $this->faker->sentence();
        return [
            'title' => $title,
            'subtitle' => $this->faker->sentence(),
            'description' => $this->faker->paragraph(),
            'status' => $this->faker->randomElement([Course::BORRADOR, Course::REVISION, Course::PUBLICADO]),
            'slug' => Str::slug($title),
            'week' => $this->faker->randomElement(['Lunes a Viernes', 'Sabado y Domingo', 'Miercoles a Viernes']) ,
            'hourStart' => $this->faker->time() ,
            'hourEnd' => $this->faker->time(),
            'link' => $this->faker->sentence(),
            'user_id' => 1,
            'category_id' => Category::all()->random()->id
        ];

    }
}
