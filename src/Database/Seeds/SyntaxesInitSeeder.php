<?php

namespace Database\Seeds;

require_once 'vendor/autoload.php';

use Database\AbstractSeeder;
use Faker\Factory;

class SyntaxesInitSeeder extends AbstractSeeder {

    protected ?string $tableName = "syntaxes";

    protected array $tableColumns = [
        [
            'data_type' => 'string',
            'column_name' => 'name'
        ],
    ];

    public function createRowData(): array
    {
        $syntaxes = [
            "plaintext",
            "html",
            "css",
            "javascript",
            "typescript",
            "python",
            "java",
            "php",
            "go",
            "ruby",
            "swift",
            "kotlin",
            "json",
            "yaml",
            "xml",
            "markdown",
            "sql",
            "bash",
        ];

        $syntaxesRowData = [];
        foreach ($syntaxes as $syntax) {
            $syntaxData = [
                $syntax,
            ];

            array_push($syntaxesRowData, $syntaxData);
        }

        return $syntaxesRowData;
    }
}