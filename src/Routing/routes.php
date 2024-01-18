<?php

use Helpers\DatabaseHelper;
use Helpers\ValidationHelper;
use Response\HTTPRenderer;
use Response\Render\HTMLRenderer;
use Response\Render\JSONRenderer;

return [
    'snippet/create'=>function(): HTTPRenderer{
        $syntaxes = DatabaseHelper::getSyntaxes();

        return new HTMLRenderer('component/createSnippet', ['syntaxes' => $syntaxes]);
    },
    'snippet/library'=>function(): HTTPRenderer{
         // TODO: スニペット一覧をDBから取得する
         return new HTMLRenderer('component/library');
    },
    'snippet/save'=>function(): HTTPRenderer{
        // TODO: バリデーションと保存、問題なければ固有ページへ遷移
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