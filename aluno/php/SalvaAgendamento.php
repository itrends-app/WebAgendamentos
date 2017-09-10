<?php
session_name('aluno');
session_start();
include_once('../../php/conexao.php');

$data_marcada_new = $_SESSION['data_marcada'];
$stmt = $pdo->prepare("insert into tb_agendamentos (aluno_id, monitor_id, curso_id, horario, dia, hora, data) values (:aluno, :monitor, :curso, :horario, :dia, :hora, :data)");
$stmt->bindValue(":aluno", $_SESSION['aluno']);
$stmt->bindValue(":monitor", $_SESSION['monitor_selecionado']);
$stmt->bindValue(":curso", $_SESSION['sel_curso']);
$stmt->bindValue(":horario", $_SESSION['dia_marcado'] . " de " . utf8_decode($_SESSION['mes_marcado']) . " de " . $_SESSION['ano_marcado'] . " " . $_SESSION['hora_marcada']);
$stmt->bindValue(":dia", $_SESSION['dia_marcado']);
$stmt->bindValue(":hora", $_SESSION['hora_marcada']);
$stmt->bindValue(":data", date('Y-m-d', strtotime($data_marcada_new)));
$stmt->execute();

if ($stmt) {

    include_once './envia_email.php';
    $_SESSION['confirm'] = true;
    header('location:../confirmaragendamento.php');
} else {
    echo "<i class='fa fa-close fa-2x c-red'></i> Erro ao tentar confirmar o agendamento. Por favor entre em contato com o administrador do sistema!";
    echo "<div class='mg-top-10'></div>";
    echo "<a href='confirmar_agendamento.php'><input type='button' value='Voltar' class='button button-orange wdt-125 hgt-35'></a>";
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

