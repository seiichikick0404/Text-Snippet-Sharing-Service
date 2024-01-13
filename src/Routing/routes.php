<?php

use Helpers\DatabaseHelper;
use Helpers\ValidationHelper;
use Response\HTTPRenderer;
use Response\Render\HTMLRenderer;
use Response\Render\JSONRenderer;

return [
    'create'=>function(): HTTPRenderer{
        // データが必要な場合ここで取得
        return new HTMLRenderer('component/createSnippet');
    },
    'library'=>function(): HTTPRenderer{
         // TODO: スニペット一覧をDBから取得する
         return new HTMLRenderer('component/library');
    },
    'show'=>function(): HTTPRenderer{
        // TODO: 詳細情報をDBから取得する
        return new HTMLRenderer('component/show');
   },
    'api/parts'=>function(){
        $id = ValidationHelper::integer($_GET['id']??null);
        $part = DatabaseHelper::getComputerPartById($id);
        return new JSONRenderer(['part'=>$part]);
    },
];