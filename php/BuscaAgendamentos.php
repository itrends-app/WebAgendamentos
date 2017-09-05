<?php

try {
    include_once('./conexao.php');
    $st = $pdo->prepare("select us.username, us.firstname, ag.* from tb_agendamentos ag, vw_usuarios us where us.id = ag.aluno_id and ag.monitor_id = :monitor_id order by str_to_date(data, '%Y-%m-%d'), hora");
    $st->bindValue(":monitor_id", $_POST['monitor_id']);
    $st->execute();
    if ($st->rowCount() > 0) {
        while ($linha = $st->fetch(PDO::FETCH_ASSOC)) {
            $vetor[] = array_map('utf8_encode', $linha);
        }
        echo json_encode($vetor);
    } else {
        echo json_encode("not");
    }
} catch (Exception $ex) {
    echo $ex->getMessage();
}
