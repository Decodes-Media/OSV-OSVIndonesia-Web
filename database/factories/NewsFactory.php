<?php

namespace Database\Factories;

use App\Models\News;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\News>
 */
class NewsFactory extends Factory
{
    public function definition(): array
    {
        $title = ucwords($this->faker->sentence);

        $paragraphs = collect((array) $this->faker->paragraphs(rand(6, 12)));

        return [
            'type' => News::class,
            'title' => $title,
            'slug' => Str::slug($title),
            'category' => 'Berita',
            'status' => 'Published',
            'cover_path' => sprintf('static/banner-%s.webp', rand(3, 5)),
            'body' => $paragraphs->map(fn ($x) => "<p>{$x}</p>")->implode(''),
            'excerpt' => $paragraphs->first(),
            'is_published' => true,
            'published_at' => now()->toDateTimeString(),
            'published_by' => null,
            'metadata' => [],
        ];
    }
}
