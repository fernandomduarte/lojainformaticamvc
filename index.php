<?php
session_start();
require 'config.php';

/** 
 * Foi adicionado no último condicional 'elseif' uma verificação se existe uma
 * pasta com o nome de helpers, caso existir ela é importada ao projeto 
**/

spl_autoload_register(function ($class){
    if(file_exists('controllers/'.$class.'.php')) {
            require_once 'controllers/'.$class.'.php';
    } elseif(file_exists('models/'.$class.'.php')) {
            require_once 'models/'.$class.'.php';
    } elseif(file_exists('core/'.$class.'.php')) {
            require_once 'core/'.$class.'.php';
    } elseif(file_exists('helpers/'.$class.'.php')) {
            require_once('helpers/'.$class.'.php');
    }
});

$core = new Core();
$core->run();
?>