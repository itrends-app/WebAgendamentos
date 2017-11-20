<?php

session_start();
$monitor = $_POST['monitor'];
include_once('./conexao.php');
$stmt = $pdo->prepare("select * from tb_horarios_monitor where monitor_id = :monitor");
$stmt->bindValue(":monitor", $monitor);
$stmt->execute();
$con = $stmt->fetch(PDO::FETCH_ASSOC);
if ($con['monitor_id'] == $monitor) {
    $_SESSION['monitor'] = $monitor;
    echo "ok";
}