<?php
session_name('tutor');
session_start();

include_once('./Conexao.php');
$data_inicial = $_POST['data_inicial'];
$data_final = $_POST['data_final'];

$stmt = $pdo->prepare("select * from tb_agendamentos ag, vw_usuarios us where us.id = ag.aluno_id and str_to_date(ag.data, '%Y-%m-%d') between str_to_date(:data_inicial, '%Y-%m-%d') and str_to_date(:data_final, '%Y-%m-%d') and ag.monitor_id = :monitor");
$stmt->bindValue(":data_inicial", $data_inicial);
$stmt->bindValue(":data_final", $data_final);
$stmt->bindValue(":monitor", $_SESSION['tutor_id']);
$stmt->execute();

$cont = 0;
while($linha = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $vetor[] = array_map('utf8_encode', $linha); 
    $cont++;
}
if($cont > 0) {
    echo json_encode($vetor);
} else {
    echo 'null';
}

