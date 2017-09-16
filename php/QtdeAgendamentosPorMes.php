<?php

//verifica as datas iniciais e finais
$mesAtual = date('m');
$anoAtual = date('Y');

if ($mesAtual == "01") {
    //número de agendamentos do mes de janeiro
    $st1 = $pdo->prepare('select count(id) as num from tb_agendamentos where str_to_date(data,"%Y-%m-%d") between str_to_date("' . date('Y') . '-01-01", "%Y-%m-%d") and str_to_date("' . date('Y') . '-01-31", "%Y-%m-%d")');
    $st1->execute();
    $rs_jan = $st1->fetch(PDO::FETCH_ASSOC);
    $jan = intval($rs_jan['num']);

    //número de agendamentos do mes de fevereiro
    $st2 = $pdo->prepare("select count(id) as num from tb_agendamentos where str_to_date(data, '%Y-%m-%d') between str_to_date('2017-02-01', '%Y-%m-%d') and str_to_date('2017-02-29', '%Y-%m-%d')");
    $st2->execute();
    $rs_fev = $st2->fetch(PDO::FETCH_ASSOC);
    $fev = intval($rs_fev['num']);
}





//número de agendamentos do mes de março
$st3 = $pdo->prepare("select count(id) as num from tb_agendamentos where str_to_date(data, '%Y-%m-%d') between str_to_date('2017-03-01', '%Y-%m-%d') and str_to_date('2017-03-31', '%Y-%m-%d')");
$st3->execute();
$rs_marco = $st3->fetch(PDO::FETCH_ASSOC);
$marco = intval($rs_marco['num']);

//número de agendamentos do mes de abril
$st4 = $pdo->prepare("select count(id) as num from tb_agendamentos where str_to_date(data, '%Y-%m-%d') between str_to_date('2017-04-01', '%Y-%m-%d') and str_to_date('2017-04-31', '%Y-%m-%d')");
$st4->execute();
$rs_abril = $st4->fetch(PDO::FETCH_ASSOC);
$abril = intval($rs_abril['num']);

//número de agendamentos do mes de maio
$st5 = $pdo->prepare("select count(id) as num from tb_agendamentos where str_to_date(data, '%Y-%m-%d') between str_to_date('2017-05-01', '%Y-%m-%d') and str_to_date('2017-05-31', '%Y-%m-%d')");
$st5->execute();
$rs_maio = $st5->fetch(PDO::FETCH_ASSOC);
$maio = intval($rs_maio['num']);

//número de agendamentos do mes de junho
$st6 = $pdo->prepare("select count(id) as num from tb_agendamentos where str_to_date(data, '%Y-%m-%d') between str_to_date('2017-06-01', '%Y-%m-%d') and str_to_date('2017-06-31', '%Y-%m-%d')");
$st6->execute();
$rs_junho = $st6->fetch(PDO::FETCH_ASSOC);
$junho = intval($rs_junho['num']);

//número de agendamentos do mes de julho
$st7 = $pdo->prepare("select count(id) as num from tb_agendamentos where str_to_date(data, '%Y-%m-%d') between str_to_date('2017-07-01', '%Y-%m-%d') and str_to_date('2017-07-31', '%Y-%m-%d')");
$st7->execute();
$rs_julho = $st7->fetch(PDO::FETCH_ASSOC);
$julho = intval($rs_julho['num']);

//número de agendamentos do mes de agosto
$st8 = $pdo->prepare("select count(id) as num from tb_agendamentos where str_to_date(data, '%Y-%m-%d') between str_to_date('2017-08-01', '%Y-%m-%d') and str_to_date('2017-08-31', '%Y-%m-%d')");
$st8->execute();
$rs_agosto = $st8->fetch(PDO::FETCH_ASSOC);
$agosto = intval($rs_agosto['num']);

//número de agendamentos do mes de setembro
$st9 = $pdo->prepare("select count(id) as num from tb_agendamentos where str_to_date(data, '%Y-%m-%d') between str_to_date('2017-09-01', '%Y-%m-%d') and str_to_date('2017-09-31', '%Y-%m-%d')");
$st9->execute();
$rs_set = $st9->fetch(PDO::FETCH_ASSOC);
$setembro = intval($rs_set['num']);

//número de agendamentos do mes de outubro
$st10 = $pdo->prepare("select count(id) as num from tb_agendamentos where str_to_date(data, '%Y-%m-%d') between str_to_date('2017-10-01', '%Y-%m-%d') and str_to_date('2017-10-31', '%Y-%m-%d')");
$st10->execute();
$rs_out = $st10->fetch(PDO::FETCH_ASSOC);
$outubro = intval($rs_out['num']);

//número de agendamentos do mes de novembro
$st11 = $pdo->prepare("select count(id) as num from tb_agendamentos where str_to_date(data, '%Y-%m-%d') between str_to_date('2017-11-01', '%Y-%m-%d') and str_to_date('2017-11-31', '%Y-%m-%d')");
$st11->execute();
$rs_nov = $st11->fetch(PDO::FETCH_ASSOC);
$novembro = intval($rs_nov['num']);

//número de agendamentos do mes de dezembro
$st12 = $pdo->prepare("select count(id) as num from tb_agendamentos where str_to_date(data, '%Y-%m-%d') between str_to_date('2017-12-01', '%Y-%m-%d') and str_to_date('2017-12-31', '%Y-%m-%d')");
$st12->execute();
$rs_dez = $st12->fetch(PDO::FETCH_ASSOC);
$dezembro = intval($rs_dez['num']);
