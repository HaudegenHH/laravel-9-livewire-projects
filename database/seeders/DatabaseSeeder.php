<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Continent;
use App\Models\Country;
use App\Models\TodoItem;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // TodoItem::factory(5)->create();

        $continents = [
            ['id' => 1, 'name' => 'Europe'],
            ['id' => 2, 'name' => 'Asia'],
            ['id' => 3, 'name' => 'Africa'],
            ['id' => 4, 'name' => 'South America'],
            ['id' => 5, 'name' => 'North America'],
            ['id' => 6, 'name' => 'Australia'],
        ];

        foreach($continents as $continent){
            Continent::factory()->create($continent)
                ->each(function ($con) {
                    $con->countries()->saveMany(Country::factory(10)->make());
                });
        }
    }
}
