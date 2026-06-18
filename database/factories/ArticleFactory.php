<?php

namespace Database\Factories;

use App\Models\Article;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = $this->faker->randomElement([
            "Lancement du programme d'éducation pour tous dans les régions rurales",
            "Comment le changement climatique affecte les communautés vulnérables",
            "Rapport annuel 2025 : Retour sur nos actions humanitaires",
            "Campagne de reboisement : 10 000 arbres plantés ce mois-ci",
            "L'accès à l'eau potable : Un droit humain fondamental pour nos villages",
            "Journée internationale de la solidarité : Ensemble pour le développement",
        ]);

        $images = [
            'https://images.unsplash.com/photo-1488521787991-ed7bbaae773c?q=80&w=800&auto=format&fit=crop',
            'https://images.unsplash.com/photo-1509062522246-3755977927d7?q=80&w=800&auto=format&fit=crop',
            'https://images.unsplash.com/photo-1464822759023-fed622ff2c3b?q=80&w=800&auto=format&fit=crop',
            'https://images.unsplash.com/photo-1559027615-cd44874e90e5?q=80&w=800&auto=format&fit=crop',
            'https://images.unsplash.com/photo-1542810634-71277d95dcbb?q=80&w=800&auto=format&fit=crop',
            'https://images.unsplash.com/photo-1532629345422-7515f3d16bb6?q=80&w=800&auto=format&fit=crop',
        ];

        // Randomly pick one or use index
        static $index = 0;
        $imageUrl = $images[$index % count($images)];
        $index++;

        return [
            'title' => $title,
            'slug' => \Illuminate\Support\Str::slug($title) . '-' . $this->faker->unique()->numberBetween(1, 100),
            'content' => '<h3>Introduction</h3><p>' . $this->faker->paragraph(3) . '</p><h3>Nos objectifs</h3><p>' . $this->faker->paragraph(4) . '</p><h3>Perspectives d\'avenir</h3><p>' . $this->faker->paragraph(3) . '</p>',
            'image' => $imageUrl,
            'seo_title' => $title . ' - ONG ADH',
            'seo_description' => $this->faker->text(150),
            'is_published' => true,
            'published_at' => $this->faker->dateTimeBetween('-1 month', 'now'),
        ];
    }
}
