<?php

session_name("aluno");
session_start();

include('../../php/conexao.php');

$dataI = date('Y-m-d', strtotime($_POST['data_ini']));
$dataF = date('Y-m-d', strtotime($_POST['data_fim']));

$st = $pdo->prepare("select us.firstname, us.email, c.fullname, ag.id, ag.horario, ag.monitor_id from tb_agendamentos ag, vw_usuarios us, vw_cursos c where ag.monitor_id = us.id and ag.curso_id = c.id_course and ag.aluno_id = :id_aluno and str_to_date(ag.data, '%Y-%m-%d') between str_to_date(:dataI, '%Y-%m-%d') and str_to_date(:dataF, '%Y-%m-%d')");
$st->bindValue(":id_aluno", $_SESSION['aluno']);
$st->bindValue(":dataI", $dataI);
$st->bindValue(":dataF", $dataF);
$st->execute();
if ($st->rowCount() > 0) {
    while ($conn = $st->fetch(PDO::FETCH_ASSOC)) {
        $vetor[] = array_map("utf8_encode", $conn);
    }
    echo json_encode($vetor);
} else {
    echo json_encode("not");
}

