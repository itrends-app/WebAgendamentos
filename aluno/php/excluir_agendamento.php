<?php
session_name('aluno');
session_start();
$motivo = $_POST['motivo'];

include_once("./envia_email_cancelamento.php");
include_once("../../php/conexao.php");
$stmt = $pdo->prepare("delete from tb_agendamentos where id = :id");
$stmt->bindValue(":id", $_POST['agend']);
$stmt->execute();
if($stmt) {
    header("location:../cancel_sucess.php");
}