<?php

namespace Database\Seeds;

require_once 'vendor/autoload.php';


use Database\AbstractSeeder;
use Faker\Factory;

class ComputerPartsSeeder extends AbstractSeeder {
    protected ?string $tableName = 'computer_parts';
    protected array $tableColumns = [
        [
            'data_type' => 'string',
            'column_name' => 'name'
        ],
        [
            'data_type' => 'string',
            'column_name' => 'type'
        ],
        [
            'data_type' => 'string',
            'column_name' => 'brand'
        ],
        [
            'data_type' => 'string',
            'column_name' => 'model_number'
        ],
        [
            'data_type' => 'string',
            'column_name' => 'release_date'
        ],
        [
            'data_type' => 'string',
            'column_name' => 'description'
        ],
        [
            'data_type' => 'int',
            'column_name' => 'performance_score'
        ],
        [
            'data_type' => 'float',
            'column_name' => 'market_price'
        ],
        [
            'data_type' => 'float',
            'column_name' => 'rsm'
        ],
        [
            'data_type' => 'float',
            'column_name' => 'power_consumptionw'
        ],
        [
            'data_type' => 'float',
            'column_name' => 'lengthm'
        ],
        [
            'data_type' => 'float',
            'column_name' => 'widthm'
        ],
        [
            'data_type' => 'float',
            'column_name' => 'heightm'
        ],
        [
            'data_type' => 'int',
            'column_name' => 'lifespan'
        ]
    ];

    public function createRowData(): array {
        $partNames = [
            'Ryzen 9 5900X', 'Core i9 10900K', 'Threadripper 3990X',
            'Core i5 11600K', 'Ryzen 5 5600X', 'Pentium Gold G6400'
        ];

        $faker = Factory::create();

        $partsList = [];
        for ($i = 0; $i < 5; $i++) {
            $parts = [
                $faker->randomElement($partNames),  // name: ランダムな3単語の組み合わせ
                $faker->randomElement(['CPU', 'GPU', 'RAM', 'Motherboard', 'Storage']),  // type: PCパーツのタイプ
                $faker->company,  // brand: ランダムな会社名
                $faker->bothify('???-########'),  // model_number: ランダムなモデル番号
                $faker->date($format = 'Y-m-d', $max = 'now'),  // release_date: リリース日
                $faker->text($maxNbChars = 200),  // description: 説明文
                $faker->numberBetween(50, 100),  // performance_score: パフォーマンススコア
                $faker->randomFloat(2, 100, 600),  // market_price: 市場価格
                $faker->randomFloat(2, 0.01, 0.1),  // rsm: RSM値
                $faker->randomFloat(1, 50.0, 150.0),  // power_consumptionw: 消費電力(W)
                $faker->randomFloat(2, 0.01, 0.1),  // lengthm: 長さ(m)
                $faker->randomFloat(2, 0.01, 0.1),  // widthm: 幅(m)
                $faker->randomFloat(3, 0.001, 0.01),  // heightm: 高さ(m)
                $faker->numberBetween(1, 10)  // lifespan: 寿命(年)
            ];

            array_push($partsList, $parts);
        }

        return $partsList;
    }
}