<?php

namespace Helpers;

use Database\MySQLWrapper;
use Exception;

class DatabaseHelper
{
    public static function getRandomComputerPart(): array{
        $db = new MySQLWrapper();

        $stmt = $db->prepare("SELECT * FROM computer_parts ORDER BY RAND() LIMIT 1");
        $stmt->execute();
        $result = $stmt->get_result();
        $part = $result->fetch_assoc();

        if (!$part) throw new Exception('Could not find a single part in database');

        return $part;
    }

    public static function getComputerPartById(int $id): array{
        $db = new MySQLWrapper();

        $stmt = $db->prepare("SELECT * FROM computer_parts WHERE id = ?");
        $stmt->bind_param('i', $id);
        $stmt->execute();

        $result = $stmt->get_result();
        $part = $result->fetch_assoc();

        if (!$part) throw new Exception('Could not find a single part in database');

        return $part;
    }

    public static function getComputerPartsByType(string $type, string $page, string $perpage): array
    {
        $db = new MySQLWrapper();

        // ページネーションの計算
        $offset = ($page - 1) * $perpage;
        $limit = $perpage;

        // タイプに基づいて部品を取得し、ページネーションを適用する
        $stmt = $db->prepare("SELECT * FROM computer_parts WHERE type = ? LIMIT ? OFFSET ?");
        $stmt->bind_param('sii', $type, $limit, $offset);
        $stmt->execute();

        $result = $stmt->get_result();

        // 全ての結果を取得
        $parts = [];
        while ($part = $result->fetch_assoc()) {
            $parts[] = $part;
        }

        if (!$parts) throw new Exception('Could not find any parts of the specified type in the database');

        return $parts;
    }

    public static function getComputerPartsByPerformance(string $type, string $order): array
    {
        $db = new MySQLWrapper();

        $sql = "SELECT *
                FROM computer_parts
                WHERE type = ?
                ORDER BY performance_score $order LIMIT 50";

        $stmt = $db->prepare($sql);

        $stmt->bind_param('s', $type);
        $stmt->execute();

        $result = $stmt->get_result();

        // 全ての結果を取得
        $parts = [];
        while ($part = $result->fetch_assoc()) {
            $parts[] = $part;
        }

        if (!$parts) throw new Exception('Could not find any parts of the specified type in the database');

        return $parts;
    }

    public static function getSyntaxes(): array
    {
        $db = new MySQLWrapper();

        $sql = "SELECT * FROM syntaxes";
        $stmt = $db->prepare($sql);
        $stmt->execute();

        $result = $stmt->get_result();

        // 全ての結果を取得
        $dataList = [];
        while ($data = $result->fetch_assoc()) {
            $dataList[] = $data;
        }

        if (!$dataList) throw new Exception('Could not find a data in database');

        return $dataList;
    }
}