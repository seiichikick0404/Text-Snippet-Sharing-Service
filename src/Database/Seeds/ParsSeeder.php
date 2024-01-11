<?php

namespace Database\Seeds;

require_once 'vendor/autoload.php';

use Database\AbstractSeeder;
use Faker\Factory;
use Database\MySQLWrapper;

class ParsSeeder extends AbstractSeeder {

    protected ?string $tableName = "parts";

    protected array $tableColumns = [
        [
            'data_type' => 'int',
            'column_name' => 'car_id'
        ],
        [
            'data_type' => 'string',
            'column_name' => 'name'
        ],
        [
            'data_type' => 'string',
            'column_name' => 'description'
        ],
        [
            'data_type' => 'float',
            'column_name' => 'price'
        ],
        [
            'data_type' => 'int',
            'column_name' => 'quantity_in_stock'
        ],
    ];

    public function createRowData(): array
    {
        $carsData = $this->getCarData(1000);

        // 1000台の車に10万のパーツを紐づけたデータを生成する
        $faker = Factory::create();
        $partsRowData = [];
        for ($i = 0; $i < 1000; $i++) {
            for ($j = 0; $j < 100; $j++) {
                $parts = [
                    (int)$carsData[$i]['id'],
                    $faker->word,
                    $faker->text($maxNbChars = 200),
                    $faker->randomFloat(2, 100, 600),
                    $faker->numberBetween(0, 1000),  // 在庫数
                ];
                array_push($partsRowData, $parts);
            }
        }

        // var_dump($partsRowData);
        // exit;


        return $partsRowData;
    }

    private function getCarData(int $getNum): array
    {
        $mysqli = new MySQLWrapper();
        $query = sprintf("SELECT * FROM cars LIMIT %d", $getNum);

        // クエリの実行
        $result = $mysqli->query($query);

        // クエリの結果を配列に格納
        $carsData = [];
        while($row = $result->fetch_assoc()) {
            $carsData[] = $row;
        }

        return $carsData;
    }
}