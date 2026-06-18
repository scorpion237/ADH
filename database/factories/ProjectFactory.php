<?php

namespace Database\Factories;

use App\Models\Project;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Project>
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $projects = [
            [
                'title' => "Forage de puits d'eau potable",
                'description' => "Projet visant à installer 5 forages d'eau potable équipés de pompes solaires pour desservir plus de 2 000 habitants.",
                'image' => 'https://images.unsplash.com/photo-1541944743827-e04aa6427c33?q=80&w=800&auto=format&fit=crop',
                'budget' => "12 500 €",
                'location' => "Région des Savanes",
                'status' => "ongoing",
            ],
            [
                'title' => "Électrification solaire de centres de santé",
                'description' => "Équipement en kits solaires photovoltaïques de trois dispensaires médicaux ruraux pour assurer les soins de nuit.",
                'image' => 'https://images.unsplash.com/photo-1509391366360-2e959784a276?q=80&w=800&auto=format&fit=crop',
                'budget' => "18 000 €",
                'location' => "Région des Plateaux",
                'status' => "completed",
            ],
            [
                'title' => "Construction d'une bibliothèque et salle informatique",
                'description' => "Création d'un espace d'apprentissage numérique doté de 15 ordinateurs et 1000 livres pour les jeunes élèves.",
                'image' => 'https://images.unsplash.com/photo-1529156069898-49953e39b3ac?q=80&w=800&auto=format&fit=crop',
                'budget' => "24 500 €",
                'location' => "Lomé Commune",
                'status' => "planning",
            ],
            [
                'title' => "Soutien aux coopératives agricoles féminines",
                'description' => "Fourniture de semences améliorées, d'outils modernes et de formations sur la transformation agroalimentaire pour 150 femmes.",
                'image' => 'https://images.unsplash.com/photo-1593113630400-ea4288922497?q=80&w=800&auto=format&fit=crop',
                'budget' => "9 800 €",
                'location' => "Région Centrale",
                'status' => "ongoing",
            ],
        ];

        static $index = 0;
        $projectData = $projects[$index % count($projects)];
        $index++;

        return [
            'title' => $projectData['title'],
            'slug' => \Illuminate\Support\Str::slug($projectData['title']) . '-' . $this->faker->unique()->numberBetween(1, 100),
            'description' => $projectData['description'],
            'content' => '<h3>Description du projet</h3><p>' . $projectData['description'] . '</p><h3>Objectifs visés</h3><p>' . $this->faker->paragraph(3) . '</p><h3>Impact attendu</h3><p>' . $this->faker->paragraph(2) . '</p>',
            'image' => $projectData['image'],
            'budget' => $projectData['budget'],
            'location' => $projectData['location'],
            'status' => $projectData['status'],
            'seo_title' => $projectData['title'] . ' - Projet ONG ADH',
            'seo_description' => substr($projectData['description'], 0, 150),
        ];
    }
}
