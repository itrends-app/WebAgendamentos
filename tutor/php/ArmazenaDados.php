<?php

session_name('tutor');
session_start();
include_once './HoraAtual.php';

$data_agendada = $_POST['data'];
$hora_agendada = $_POST['hora'];

//conversão de String para Date
$data_agendada_conv = date('Y-m-d H:i', strtotime($data_agendada . " " . $hora_agendada));
$data_atual_conv = date('Y-m-d H:i', strtotime($dia_atual . " " . $hora_atual . " + 24 hours"));
if ($data_atual_conv >= $data_agendada_conv) {
    unset($_SESSION['agendamento_id']);
    echo "not";
} else {
    $_SESSION['data_agendada'] = $_POST['data'];
    $_SESSION['hora_agendada'] = $_POST['hora'];
    $_SESSION['agendamento_id'] = $_POST['agendamento'];

    echo "ok";
}