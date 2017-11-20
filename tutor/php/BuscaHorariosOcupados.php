<?php
include_once './php/Conexao.php';

$st = $pdo->prepare("select *, count(horario) as num_alunos from tb_agendamentos where monitor_id = :tutor group by horario order by str_to_date(data, '%Y-%m-%d') desc");
$st->bindValue(":tutor", $_SESSION['tutor_id']);
$st->execute();

if ($st) {
    while ($conn = $st->fetch(PDO::FETCH_ASSOC)) {
        $data = $conn['data'];
        $hora = $conn['hora'];
        $agendamento = $conn['id'];
        echo "<tr><td>".utf8_encode($conn['horario'])."</td><td>".$conn['num_alunos']."</td>";
        echo "<td class='text-center'><a href='#' onclick=selecionarHorario('$data','$hora',$agendamento);><i class='material-icons md-dark'>add</i></a></td></tr>";
    }
} 
