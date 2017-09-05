<?php

$st = $pdo->prepare("select ag.*, us.id as id_usuario, us.email from tb_agendamentos ag, vw_usuarios us where us.id = ag.monitor_id order by ag.id desc limit 1");
$st->execute();
$con_last_agendamento = $st->fetch(PDO::FETCH_ASSOC);
$lastid = $con_last_agendamento['id'];
$email_monitor = $con_last_agendamento['email'];

$st2 = $pdo->prepare("select * from tb_agendamentos ag, vw_usuarios us where ag.aluno_id = us.id order by ag.id desc limit 1");
$st2->execute();
$con_busca_aluno = $st2->fetch(PDO::FETCH_ASSOC);
$nome_aluno = $con_busca_aluno['firstname'];

