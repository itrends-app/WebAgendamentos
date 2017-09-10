<?php
session_name('tutor');
session_start();
include_once('./Conexao.php');
include './DataHoraAtual.php';

$ano = 0;
if(intval(date('m', strtotime($data_atual_servidor))) == 12 && intval($_POST['dia']) < intval(date('d', strtotime($data_atual_servidor)))) {
    $ano = intval(date('Y', strtotime($data_atual_servidor))) + 1;
} else {
    $ano = intval(date('Y', strtotime($data_atual_servidor)));
}


$nova_data = $ano."-".$_POST['num_mes']."-".$_POST['dia'];
$data_antiga = $_SESSION['data_agendada'];
$hora_antiga = $_SESSION['hora_agendada'];

include_once './EnviaEmailReagendamento.php';

$stmt = $pdo->prepare("update tb_agendamentos set horario = :horario, dia = :dia, hora = :hora, data = :data where data = :data_antiga and hora = :hora_antiga");
$stmt->bindValue(":horario", $_POST['dia']." de ".utf8_decode($_POST['mes'])." de ".$ano." ".$_POST['hora']);
$stmt->bindValue(":dia", $_POST['dia']);
$stmt->bindValue(":hora", $_POST['hora']);
$stmt->bindValue(":data", date('Y-m-d', strtotime($nova_data)));
$stmt->bindValue(":data_antiga", date('Y-m-d', strtotime($data_antiga)));
$stmt->bindValue(":hora_antiga", $hora_antiga);
$stmt->execute();

if($stmt) {
    unset($_SESSION['agendamento_id']);
    echo "ok";
} else {
    echo "not";
}

