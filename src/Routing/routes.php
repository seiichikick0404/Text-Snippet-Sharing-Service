<?php

use Helpers\DatabaseHelper;
use Helpers\ValidationHelper;
use Response\HTTPRenderer;
use Helpers\CreateSnippetHelper;
use Response\Render\HTMLRenderer;
use Response\Render\JSONRenderer;



return [
    'snippet/create'=>function(): HTTPRenderer{
        $syntaxes = DatabaseHelper::getSyntaxes();

        return new HTMLRenderer('component/createSnippet', ['syntaxes' => $syntaxes]);
    },
    'snippet/library'=>function(): HTTPRenderer{
         $snippets = DatabaseHelper::getActiveSnippets();
         return new HTMLRenderer('component/library', ['snippets' => $snippets]);
    },
    'snippet/save'=>function(): HTTPRenderer{
        $validatedData = ValidationHelper::createSnippetPost($_POST);
        $uniquePath = CreateSnippetHelper::generatePath();
        CreateSnippetHelper::createSnippet($validatedData, $uniquePath);

        return new HTMLRenderer('component/show');
   },
    'snippet/show'=>function(): HTTPRenderer{
        $path = $_GET['uniqueKey'] ?? null;

        if (!$path) {
            header("Location: create");
            exit;
        }
        $path = ValidationHelper::string($path);
        $data = DatabaseHelper::getSnippet($path);

        return new HTMLRenderer('component/show', ['data' => $data]);
   },
    'api/parts'=>function(){
        $id = ValidationHelper::integer($_GET['id']??null);
        $part = DatabaseHelper::getComputerPartById($id);
        return new JSONRenderer(['part'=>$part]);
    },
];