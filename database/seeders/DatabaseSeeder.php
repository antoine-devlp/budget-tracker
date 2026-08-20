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
        $data = [
            'Alimentation' => ['Courses Carrefour', 'Boulangerie', 'Marché', 'Supérette'],
            'Transport' => ['Essence', 'Ticket de métro', 'Péage autoroute', 'Parking'],
            'Logement' => ['Loyer', 'Facture électricité', 'Assurance habitation', 'Internet'],
            'Santé' => ['Pharmacie', 'Médecin', 'Dentiste', 'Mutuelle'],
            'Loisirs' => ['Cinéma', 'Salle de sport', 'Concert', 'Jeu vidéo'],
            'Abonnements' => ['Netflix', 'Spotify', 'Forfait mobile', 'Cloud'],
            'Vêtements' => ['T-shirt', 'Chaussures', 'Veste', 'Jean'],
            'Restaurants' => ['Restaurant midi', 'Pizzeria', 'Café', 'Fast-food'],
            'Épargne' => ['Virement livret A', 'Épargne projet', 'Placement'],
            'Cadeaux' => ['Cadeau anniversaire', 'Cadeau Noël', 'Fleurs'],
            'Éducation' => ['Livre technique', 'Formation en ligne', 'Fournitures'],
            'Divers' => ['Frais bancaires', 'Achat imprévu', 'Réparation'],
        ];
        $user = User::firstOrCreate(
            ['email' => 'demo@budget-tracker.test'],
            [
                'name' => 'Test User',
                'password' => 'Password'
            ]
        );
        foreach ($data as $name => $labels) {
            $user->categories()->firstOrCreate(['name' => $name]);
        }
        $categories = $user->categories;
        for ($i = 0; $i < 50; $i++) {
            if ($i % 10 === 0) {
                $category = null;
                $label = fake()->randomElement($data['Divers']);
            } else {
                $category = $categories->random();
                $label = fake()->randomElement($data[$category->name]);
            }
            $user->transactions()->create([
                'amount' => fake()->randomFloat(2, 5, 300),
                'label' => $label,
                'transaction_date' => fake()->dateTimeBetween('-6 months', 'now'),
                'category_id' => $category?->id,
            ]);
        }
    }
}
