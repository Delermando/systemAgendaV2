<?php //

ob_start();
session_start();
header('Content-Type: text/html; charset=utf-8');
date_default_timezone_set('America/Sao_Paulo');

ini_set('display_errors', 'on');
error_reporting(E_ALL);
ini_set("log_errors", 1);

define('DB_HOST', '192.168.0.198');
define('DB_NAME', 'agenda');
define('DB_USER', 'agenda');
define('DB_PASS', 'agenda');


require_once('model/core/CardModel.php');

$arrayToSave = array('toEmail' => 'stancmansssss@hotmail.com.br',
                'toName'=>'dadasdasada',
                'fromEmail'=>'delsantoss@hotmail.com.br',
                'fromName'=>'dododasdaso',
                'message'=>'dudusdsdu',
                'date'=>'24/01/1999');

$cardModel = new CardModel();
var_dump($cardModel->update('12-fe:ae', 'personare'));
//var_dump($cardModel->save($arrayToSave));
//var_dump($cardModel->delete(12, 10, 12, 23));