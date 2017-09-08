<?php

session_name('aluno');
session_start();
include('../../php/conexao.php');

$st1 = $pdo->prepare("select * from tb_horarios_monitor hm, vw_usuarios us where hm.curso_id = :curso and hm.monitor_id = us.id and hm.status = 'Habilitado' and hm.monitor_id != :aluno");
$st1->bindValue(":curso", $_POST['curso']);
$st1->bindValue(":aluno", $_SESSION['aluno']);
$st1->execute();

if ($st1->rowCount() == 0) {
    echo json_encode("not");
} else {
    while ($conn = $st1->fetch(PDO::FETCH_ASSOC)) {
        $vetor[] = array_map("utf8_encode", $conn);
    }
    echo json_encode($vetor);
}