<?php

session_start();
try {
    include_once('./conexao.php');
    
    $stmt = $pdo->prepare("delete from tb_agendamentos where id = :id");
    $stmt->bindValue(":id", $_POST['agendamento']);
    $stmt->execute();
    
    if ($stmt) {
        unset($_SESSION['agendamento_id']);
        echo "ok";
    } else {
        unset($_SESSION['agendamento_id']);
        echo "not";
    }
} catch (PDOException $e) {
    echo $e->getMessage();
}
