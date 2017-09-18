<?php

session_name('aluno');
session_start();
include_once('../../php/conexao.php');

$data_marcada_new = $_SESSION['data_marcada'];
$stmt1 = $pdo->prepare("update tb_agendamentos set horario = :horario, dia = :dia, hora = :hora, data = :data, cont_agend = cont_agend + 1 where id = :id");
$stmt1->bindValue(":horario", $_SESSION['dia_marcado'] . " de " . utf8_decode($_SESSION['mes_marcado']) . " de " . $_SESSION['ano_marcado'] . " " . $_SESSION['hora_marcada']);
$stmt1->bindValue(":dia", $_SESSION['dia_marcado']);
$stmt1->bindValue(":hora", $_SESSION['hora_marcada']);
$stmt1->bindValue(":data", date('Y-m-d', strtotime($data_marcada_new)));
$stmt1->bindValue(":id", $_SESSION['id_agendamento']);
$stmt1->execute();

if ($stmt1) {
    include_once ('./envia_email_edicao.php');
    $_SESSION['confirm'] = true;
    header("location:../confirmar_reagendamento.php");
} else {
    $_SESSION['error'] = true;
    header("location:../confirmar_reagendamento.php");
}

