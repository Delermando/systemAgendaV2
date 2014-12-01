<?php

ob_start();
session_start();
header('Content-Type: text/html; charset=utf-8');
date_default_timezone_set('America/Sao_Paulo');

ini_set('display_errors', 'on');
error_reporting(E_ALL);
ini_set("log_errors", 1);
ini_set("error_log", "php-error.log");
error_log("erro => ");

require_once("class/clsSetVar.class.php");
require_once("ctlGlobals.php"); 
require_once("class/clsDBConnection.class.php");
require_once("class/clsQueryStatement.class.php");
require_once("class/clsMensages.class.php");

$query = new QueryStatement();
$teste = $query->deleteUserAgenda(2);
var_dump($teste);

switch ($action) {
    case "":
        $linksCabecalho = $arrayLinksCabecalho['default'];
        $title = $arrayTitle['home'];
        $caminho = 'actions/actHome.php';
        break;
    
    default :
        $title = $arrayTitle['error'];
        $caminho = 'actions/actErroMensage.php';
}