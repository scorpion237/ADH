<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // 1. Admin User
        User::factory()->create([
            'name' => 'Administrateur ADH',
            'email' => 'admin@ongadh.org',
            'password' => \Illuminate\Support\Facades\Hash::make('password123'),
        ]);

        // 2. Articles
        \App\Models\Article::factory()->count(6)->create();

        // 3. Projects
        \App\Models\Project::factory()->count(4)->create();

        // 4. Stats
        \App\Models\Stat::factory()->count(4)->create();

        // 5. Settings
        $settings = [
            ['key' => 'site_title', 'value' => 'ONG ADH | Action pour le Développement Humain', 'group' => 'general'],
            ['key' => 'site_description', 'value' => 'L\'ONG ADH (Action pour le Développement Humain) œuvre pour l\'éducation, l\'accès à l\'eau potable, l\'environnement et la santé des populations vulnérables.', 'group' => 'seo'],
            ['key' => 'google_analytics', 'value' => 'G-ABC123XYZ', 'group' => 'analytics'],
            ['key' => 'contact_email', 'value' => 'contact@ongadh.org', 'group' => 'contact'],
            ['key' => 'contact_phone', 'value' => '+228 90 12 34 56', 'group' => 'contact'],
            ['key' => 'contact_address', 'value' => '12 Avenue de la Solidarité, Lomé, Togo', 'group' => 'contact'],
            ['key' => 'facebook_url', 'value' => 'https://facebook.com/ongadh', 'group' => 'contact'],
            ['key' => 'twitter_url', 'value' => 'https://twitter.com/ongadh', 'group' => 'contact'],
            ['key' => 'linkedin_url', 'value' => 'https://linkedin.com/company/ongadh', 'group' => 'contact'],
            ['key' => 'whatsapp_number', 'value' => '+22890123456', 'group' => 'contact'],
            ['key' => 'donation_url', 'value' => '#faire-un-don-modal', 'group' => 'general'],
        ];

        foreach ($settings as $setting) {
            \App\Models\Setting::create($setting);
        }
    }
}
