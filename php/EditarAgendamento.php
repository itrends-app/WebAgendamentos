<?php

session_start();
include_once('./conexao.php');
if ($_SESSION['agendamento_id'] == "") {
    echo "not";
} else {
    try {
        include_once './EnviaEmailEdicao.php';
        $st = $pdo->prepare("update tb_agendamentos set horario = :horario, dia = :dia, hora = :hora, data = :data where id = :id");
        $st->bindValue(":horario", $_SESSION['dia_marcado'] . " de " . utf8_decode($_SESSION['mes_marcado']) . " de " . $_SESSION['ano_marcado'] . " " .$_SESSION['hora_marcada']);
        $st->bindValue(":dia", $_SESSION['dia_marcado']);
        $st->bindValue(":hora", $_SESSION['hora_marcada']);
        $st->bindValue(":data", date('Y-m-d', strtotime($_SESSION['data_marcada'])));
        $st->bindValue(":id", $_SESSION['agendamento_id']);
        $st->execute();

        if ($st) {
            $_SESSION['agendamento_id'] = "";
            echo "ok";
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

