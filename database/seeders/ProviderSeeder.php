<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Provider;

class ProviderSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    $providers = [
      [
        'name'         => 'WhereBy',
        'base_url'     => 'https://api.whereby.dev/v1',
        'base_api_url' => null
      ],
      [
        'name'         => 'Zoom',
        'base_url'     => 'https://zoom.us',
        'base_api_url' => 'https://api.zoom.us/v2'
      ]
    ];

    foreach ($providers as $provider) {
      Provider::create([
        'name'         => $provider['name'],
        'base_url'     => $provider['base_url'],
        'base_api_url' => $provider['base_api_url'],
      ]);
    }
  }
}
