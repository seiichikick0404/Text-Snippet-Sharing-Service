<?php

use Helpers\DatabaseHelper;
use Helpers\ValidationHelper;
use Response\HTTPRenderer;
use Response\Render\HTMLRenderer;
use Response\Render\JSONRenderer;

return [
    'snippet/create'=>function(): HTTPRenderer{
        // データが必要な場合ここで取得
        return new HTMLRenderer('component/createSnippet');
    },
    'snippet/library'=>function(): HTTPRenderer{
         // TODO: スニペット一覧をDBから取得する
         return new HTMLRenderer('component/library');
    },
    'snippet/save'=>function(): HTTPRenderer{
        // TODO: 詳細情報をDBから取得する
        var_dump($_REQUEST);
        exit;
        return new HTMLRenderer('component/show');
   },
    'snippet/show'=>function(): HTTPRenderer{
        // TODO: 詳細情報をDBから取得する
        return new HTMLRenderer('component/show');
   },
    'api/parts'=>function(){
        $id = ValidationHelper::integer($_GET['id']??null);
        $part = DatabaseHelper::getComputerPartById($id);
        return new JSONRenderer(['part'=>$part]);
    },
];