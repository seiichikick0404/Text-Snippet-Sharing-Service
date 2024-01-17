<?php

namespace Database\Migrations;

use Database\SchemaMigration;

class CreateSyntaxesTable implements SchemaMigration
{
    public function up(): array
    {
        // マイグレーションロジックをここに追加してください
        return [
            "CREATE TABLE syntaxes (
                id INT PRIMARY KEY AUTO_INCREMENT,
                name VARCHAR(255) NOT NULL,
                snippet_id INT,
                FOREIGN KEY (snippet_id) REFERENCES snippets(id) ON DELETE SET NULL
            )"
        ];
    }

    public function down(): array
    {
        // ロールバックロジックを追加してください
        return ["DROP TABLE syntaxes"];
    }
}