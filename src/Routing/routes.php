<?php

use Helpers\DatabaseHelper;
use Helpers\ValidationHelper;
use Response\HTTPRenderer;
use Response\Render\HTMLRenderer;
use Response\Render\JSONRenderer;

return [
    'random/part'=>function(): HTTPRenderer{
        $part = DatabaseHelper::getRandomComputerPart();

        return new HTMLRenderer('component/random-part', ['part'=>$part]);
    },
    'parts'=>function(): HTTPRenderer{
        // IDの検証
        $id = ValidationHelper::integer($_GET['id']??null);

        $part = DatabaseHelper::getComputerPartById($id);

        var_dump($part);
        exit;
        return new HTMLRenderer('component/parts', ['part'=>$part]);
    },
    'types'=>function(): HTTPRenderer{
        $type = ValidationHelper::string($_GET['type'] ?? '');
        $page = ValidationHelper::integer($_GET['page'] ?? null);
        $perpage = ValidationHelper::integer($_GET['perpage'] ?? null);

        $parts = DatabaseHelper::getComputerPartsByType($type, $page, $perpage);
        return new HTMLRenderer('component/partsByType', ['parts'=>$parts]);
    },
    'api/random/part'=>function(): HTTPRenderer{
        $part = DatabaseHelper::getRandomComputerPart();
        return new JSONRenderer(['part'=>$part]);
    },
    'api/parts'=>function(){
        $id = ValidationHelper::integer($_GET['id']??null);
        $part = DatabaseHelper::getComputerPartById($id);
        return new JSONRenderer(['part'=>$part]);
    },
    'parts/performance'=>function(){
        $type = ValidationHelper::string($_GET['type'] ?? '');
        $order = ValidationHelper::string($_GET['order'] ?? '');

        $parts = DatabaseHelper::getComputerPartsByPerformance($type, $order);

        return new HTMLRenderer('component/parts', ['parts'=>$parts]);
    },
];