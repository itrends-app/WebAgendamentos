<?php

session_name('aluno');
session_start();

$_SESSION['id_agendamento'] = $_GET['id'];
$_SESSION['email_atual'] = $_GET['email'];

if (isset($_GET['edt'])) {
    $_SESSION['monitor_selecionado'] = $_GET['edt'];
    header("location:../editar_agendamento_aluno.php");
} else {
    header("location:../cancela_agendamento.php");
}