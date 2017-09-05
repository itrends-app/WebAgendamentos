<?php

session_start();
include_once './verifica_monitor.class.php';
//include './conexao.php';
$verificacao = new VerificaMonitor();
if ($verificacao->verificaMonitorExistente($_POST['monitor']) == false) {
    $_SESSION['monitor'] = $_POST['monitor'];
    $_SESSION['curso'] = $_POST['curso'];
    
    echo "ok";
} else {
    $_SESSION['nome_monitor'] = "";
    echo "not";
}

