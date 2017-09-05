<?php

session_start();
include_once('./conexao.php');


$_SESSION['agendamento_id'] = $_POST['agendamento'];
$_SESSION['monitor_id'] = $_POST['monitor'];
echo "ok";


