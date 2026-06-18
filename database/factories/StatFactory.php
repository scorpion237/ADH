<?php

namespace Database\Factories;

use App\Models\Stat;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Stat>
 */
class StatFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $stats = [
            [
                'title' => "Bénéficiaires accompagnés",
                'value' => "15,000+",
                'icon' => "fas fa-users",
                'sort_order' => 1,
            ],
            [
                'title' => "Projets réalisés",
                'value' => "45",
                'icon' => "fas fa-check-circle",
                'sort_order' => 2,
            ],
            [
                'title' => "Volontaires actifs",
                'value' => "120+",
                'icon' => "fas fa-hands-helping",
                'sort_order' => 3,
            ],
            [
                'title' => "Arbres plantés",
                'value' => "10k+",
                'icon' => "fas fa-leaf",
                'sort_order' => 4,
            ],
        ];

        static $index = 0;
        $statData = $stats[$index % count($stats)];
        $index++;

        return [
            'title' => $statData['title'],
            'value' => $statData['value'],
            'icon' => $statData['icon'],
            'sort_order' => $statData['sort_order'],
        ];
    }
}
