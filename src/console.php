#!/usr/bin/env php
<?php
spl_autoload_extensions(".php");
spl_autoload_register();

$commands = include "Commands/registry.php";

// 第2引数は実行するコマンド
$inputCommand = $argv[1];

//var_dump($inputCommand);

// PHPでそれらをインスタンス化できるすべてのコマンドクラス名を通過します。
foreach ($commands as $commandClass) {
    $alias = $commandClass::getAlias();
    var_dump($alias);

    if($inputCommand === $alias){
        if(in_array('--help',$argv)){
            fwrite(STDOUT, $commandClass::getHelp());
            exit(0);
        }
        else{
            $command = new $commandClass();
            $result = $command->execute();
            exit($result);
        }
    }
}

fwrite(STDOUT,"Failed to run any commands\n");