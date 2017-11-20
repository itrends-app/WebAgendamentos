<?php
session_start();
try {
    include_once ('./conexao.php');

    $st = $pdo->prepare("select id from tb_agendamentos where monitor_id = :id_monitor");
    $st->bindValue(":id_monitor", $_POST['monitor']);
    $st->execute();

    if ($st->rowCount() > 0) {
        echo "imp";
    } else {
        $stmt = $pdo->prepare("delete from tb_horarios_monitor where monitor_id = :monitor");
        $stmt->bindValue(":monitor", $_POST['monitor']);
        $stmt->execute();

        if ($stmt) {
            unset($_SESSION['monitor_id']);
            echo "ok";
        } else {
            unset($_SESSION['monitor_id']);
            echo "not";
        }
    }
} catch (PDOException $e) {
    $e->getMessage();
}

