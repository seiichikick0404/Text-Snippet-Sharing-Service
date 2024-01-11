<?php

namespace Database\Seeds;

require_once 'vendor/autoload.php';

use Database\AbstractSeeder;
use Faker\Factory;

class CarsSeeder extends AbstractSeeder {

    protected ?string $tableName = "cars";

    protected array $tableColumns = [
        [
            'data_type' => 'string',
            'column_name' => 'make'
        ],
        [
            'data_type' => 'string',
            'column_name' => 'model'
        ],
        [
            'data_type' => 'int',
            'column_name' => 'year'
        ],
        [
            'data_type' => 'string',
            'column_name' => 'color'
        ],
        [
            'data_type' => 'float',
            'column_name' => 'price'
        ],
        [
            'data_type' => 'float',
            'column_name' => 'mileage'
        ],
        [
            'data_type' => 'string',
            'column_name' => 'transmission'
        ],
        [
            'data_type' => 'string',
            'column_name' => 'engine'
        ],
        [
            'data_type' => 'string',
            'column_name' => 'status'
        ]
    ];

    public function createRowData(): array
    {
        $faker = Factory::create();
        $carsDataList = [];

        for ($i = 0; $i < 10; $i++) {
            $carsData = [
                $faker->randomElement(['Ford', 'Chevrolet', 'Toyota', 'Honda', 'Tesla']),
                $faker->word,
                $faker->numberBetween(1990, 2021),
                $faker->safeColorName,
                $faker->randomFloat(2, 5000, 80000),
                $faker->randomFloat(2, 0, 300000),
                $faker->randomElement(['manual', 'automatic']),
                $faker->randomElement(['V4', 'V6', 'V8']),
                $faker->randomElement(['new', 'used']),
            ];

            array_push($carsDataList, $carsData);
        }

        return $carsDataList;
    }
}
