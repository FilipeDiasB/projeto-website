<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Nette\Utils\Random;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->paragraph(1);
        return [
            'author_id' => 1,
            'uri' => Str::slug($title),
            'title' => $title,
            'subtitle' => $this->faker->paragraph(1),
            'content' => $this->faker->paragraph(10),
        ];
    }
}
