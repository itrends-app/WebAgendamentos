<?php
include_once './php/Conexao.php';

$st = $pdo->prepare("select *, count(horario) as num_alunos from tb_agendamentos where monitor_id = :tutor group by horario");
$st->bindValue(":tutor", $_SESSION['tutor_id']);
$st->execute();

if ($st) {
    while ($conn = $st->fetch(PDO::FETCH_ASSOC)) {
        $data = $conn['data'];
        $hora = $conn['hora'];
        $agendamento = $conn['id'];
        echo "<tr><td>".utf8_encode($conn['horario'])."</td><td>".$conn['num_alunos']."</td>";
        echo "<td><a href='#' onclick=selecionarHorario('$data','$hora',$agendamento);><i class='fa fa-hand-pointer-o c-black'></i></a></td></tr>";
    }
} 
