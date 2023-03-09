<?php

namespace Database\Seeders;

use App\Models\Plan;
use Illuminate\Database\Seeder;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $plans = [
            [
                'name' => 'Basic',
                'slug' => 'basic',
                'stripe_product' => 'prod_NUQzxFmOSK8mdd',
                'stripe_plan' => 'price_1MjS7AFr7QbB6booVZ3peNCW',
                'price' => 10,
                'interval' => 'month',
                'description' => 'Basic'
            ],
            [
                'name' => 'Premium',
                'slug' => 'premium',
                'stripe_product' => 'prod_NUQyiZOPyrLmQz',
                'stripe_plan' => 'price_1MjS6nFr7QbB6booF5igJzKR',
                'price' => 100,
                'interval' => 'month',
                'description' => 'Premium'
            ]
        ];

        foreach ($plans as $plan) {
            Plan::create($plan);
        }
    }
}
