<?php

session_start();
include_once('./conexao.php');
include_once('./DataHoraAtual.php');

$monitor_id = preg_replace('/[^[:alnum:]_]/', '', $_SESSION['monitor_id']);

$ano = 0;
if(intval(date('m', strtotime($data_atual_servidor))) == 12 && intval($_POST['dia_marcado']) < intval(date('d', strtotime($data_atual_servidor)))) {
    $ano = intval(date('Y', strtotime($data_atual_servidor))) + 1;
} else {
    $ano = intval(date('Y', strtotime($data_atual_servidor)));
}

//retorna o limite de agendamentos
$stmt1 = $pdo->prepare("select limite from tb_horarios_monitor where monitor_id = :monitor_id");
$stmt1->bindValue(":monitor_id", $monitor_id);
$stmt1->execute();
$conn_limite = $stmt1->fetch(PDO::FETCH_ASSOC);
$limite = $conn_limite['limite'];

//retorna o número de agendamentos do horário selecionado
$stmt2 = $pdo->prepare("select count(id) as num_agendamentos from tb_agendamentos where data = :data and hora = :hora and monitor_id = :monitor");
$stmt2->bindValue(":data", $_SESSION['data_comp']);
$stmt2->bindValue(":hora", $_POST['hora_marcada']);
$stmt2->bindValue(":monitor", $monitor_id);
$stmt2->execute();
$conn_agenda = $stmt2->fetch(PDO::FETCH_ASSOC);

//faz a comparação para saber se ainda tem vagas no horário escolhido
//caso sim, armazena os dados referente ao dia e horário escolhidos em sessão
if (intval($conn_agenda['num_agendamentos']) < $limite) {
    $_SESSION['hora_marcada'] = $_POST['hora_marcada'];
    $_SESSION['dia_marcado'] = $_POST['dia_marcado'];
    $_SESSION['mes_marcado'] = $_POST['mes_marcado'];
    $_SESSION['mes_num_marcado'] = $_POST['mes_num'];
    $_SESSION['data_marcada'] = $ano . "-" . $_POST['mes_num'] . "-" . $_POST['dia_marcado'];
    $_SESSION['ano_marcado'] = $ano;
    echo "ok";
} else {
    echo "not";
}
