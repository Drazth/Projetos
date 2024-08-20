<?php
session_start();
define('CONTROL', true);
$rota = $_GET['rota'] ?? 'start';

$script = null;

switch ($rota) {
    case 'start':
        $script = 'start.php';
        break;

    case 'game':
        $script = 'game.php';
        break;

    default:
        die('Acesso negado');
        break;
}

require "inc/header.php";
require "inc/$script";
require "inc/footer.php";
