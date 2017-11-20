<?php
include_once('./php/Conexao.php');

$stmt = $pdo->prepare("select * from tb_agendamentos ag, vw_usuarios us where ag.aluno_id = us.id and ag.monitor_id = :monitor order by str_to_date(ag.data, '%Y-%m-%d'), str_to_date(ag.hora, '%H:%i') limit 10");
$stmt->bindValue(":monitor", $_SESSION['tutor_id']);
$stmt->execute();
while($conn = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo "<tr><td>".$conn['username']."</td><td>".$conn['firstname']."</td>";
    echo "<td>".date('d/m/Y', strtotime($conn['data']))."</td>";
    echo "<td>".$conn['hora']."</td></tr>";
}