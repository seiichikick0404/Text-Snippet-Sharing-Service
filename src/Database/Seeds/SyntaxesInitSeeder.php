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
        [
            'data_type' => 'int',
            'column_name' => 'snippet_id'
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
            
        }

        return $syntaxesRowData;
    }
}