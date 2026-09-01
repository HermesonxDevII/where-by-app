<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Provider>
 */
class ProviderFactory extends Factory
{
  /**
   * Define the model's default state.
   *
   * @return array<string, mixed>
   */
  public function definition(): array
  {
    return [
      'name' => fake()->company(),
      'base_url' => fake()->url(),
      'base_api_url' => fake()->url(),
      'account_id' => fake()->uuid(),
      'client_id' => fake()->uuid(),
      'client_secret' => fake()->password(32),
      'secret_token' => fake()->password(32),
      'active' => fake()->boolean(),
    ];
  }
}
