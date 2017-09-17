<?php

//verifica as datas iniciais e finais
$mesAtual = date('m');
$anoAtual = date('Y');
$dataI;
$dataF;

if ($mesAtual == "01") {
    //número de agendamentos do mes de janeiro
    $dataI = $anoAtual . '-01-01';
    $dataF = $anoAtual . '-01-31';
    $st1 = $pdo->prepare('select count(id) as num from tb_agendamentos where str_to_date(data,"%Y-%m-%d") between str_to_date("' . $dataI . '", "%Y-%m-%d") and str_to_date("' . $dataF . '", "%Y-%m-%d")');
    $st1->execute();
    $rs_jan = $st1->fetch(PDO::FETCH_ASSOC);
    $jan = intval($rs_jan['num']);

    //número de agendamentos do mes de dezembro
    $dataI = ($anoAtual - 1) . '-12-01';
    $dataF = ($anoAtual - 1) . '-12-31';
    $st12 = $pdo->prepare('select count(id) as num from tb_agendamentos where str_to_date(data, "%Y-%m-%d") between str_to_date("' . $dataI . '", "%Y-%m-%d") and str_to_date("' . $dataF . '", "%Y-%m-%d")');
    $st12->execute();
    $rs_dez = $st12->fetch(PDO::FETCH_ASSOC);
    $dezembro = intval($rs_dez['num']);

    //número de agendamentos do mes de novembro
    $dataI = ($anoAtual - 1) . '-11-01';
    $dataF = ($anoAtual - 1) . '-11-31';
    $st11 = $pdo->prepare("select count(id) as num from tb_agendamentos where str_to_date(data, '%Y-%m-%d') between str_to_date('" . $dataI . "', '%Y-%m-%d') and str_to_date('" . $dataF . "', '%Y-%m-%d')");
    $st11->execute();
    $rs_nov = $st11->fetch(PDO::FETCH_ASSOC);
    $novembro = intval($rs_nov['num']);

    //número de agendamentos do mes de outubro
    $dataI = ($anoAtual - 1) . '-10-01';
    $dataF = ($anoAtual - 1) . '-10-31';
    $st10 = $pdo->prepare("select count(id) as num from tb_agendamentos where str_to_date(data, '%Y-%m-%d') between str_to_date('" . $dataI . "', '%Y-%m-%d') and str_to_date('" . $dataF . "', '%Y-%m-%d')");
    $st10->execute();
    $rs_out = $st10->fetch(PDO::FETCH_ASSOC);
    $outubro = intval($rs_out['num']);

    //número de agendamentos do mes de setembro
    $dataI = ($anoAtual - 1) . '-09-01';
    $dataF = ($anoAtual - 1) . '-09-31';
    $st9 = $pdo->prepare("select count(id) as num from tb_agendamentos where str_to_date(data, '%Y-%m-%d') between str_to_date('" . $dataI . "', '%Y-%m-%d') and str_to_date('" . $dataF . "', '%Y-%m-%d')");
    $st9->execute();
    $rs_set = $st9->fetch(PDO::FETCH_ASSOC);
    $setembro = intval($rs_set['num']);

    //número de agendamentos do mes de agosto
    $dataI = ($anoAtual - 1) . '-08-01';
    $dataF = ($anoAtual - 1) . '-08-31';
    $st8 = $pdo->prepare("select count(id) as num from tb_agendamentos where str_to_date(data, '%Y-%m-%d') between str_to_date('" . $dataI . "', '%Y-%m-%d') and str_to_date('" . $dataF . "', '%Y-%m-%d')");
    $st8->execute();
    $rs_agosto = $st8->fetch(PDO::FETCH_ASSOC);
    $agosto = intval($rs_agosto['num']);
} else if ($mesAtual == "02") {
    //número de agendamentos do mes de fevereiro
    $dataI = $anoAtual . '-02-01';
    $dataF = $anoAtual . '-02-29';
    $st2 = $pdo->prepare("select count(id) as num from tb_agendamentos where str_to_date(data, '%Y-%m-%d') between str_to_date('" . $dataI . "', '%Y-%m-%d') and str_to_date('" . $dataF . "', '%Y-%m-%d')");
    $st2->execute();
    $rs_fev = $st2->fetch(PDO::FETCH_ASSOC);
    $fev = intval($rs_fev['num']);

    //número de agendamentos do mes de janeiro
    $dataI = $anoAtual . '-01-01';
    $dataF = $anoAtual . '-01-31';
    $st1 = $pdo->prepare('select count(id) as num from tb_agendamentos where str_to_date(data,"%Y-%m-%d") between str_to_date("' . $dataI . '", "%Y-%m-%d") and str_to_date("' . $dataF . '", "%Y-%m-%d")');
    $st1->execute();
    $rs_jan = $st1->fetch(PDO::FETCH_ASSOC);
    $jan = intval($rs_jan['num']);

    //número de agendamentos do mes de dezembro
    $dataI = ($anoAtual - 1) . '-12-01';
    $dataF = ($anoAtual - 1) . '-12-31';
    $st12 = $pdo->prepare('select count(id) as num from tb_agendamentos where str_to_date(data, "%Y-%m-%d") between str_to_date("' . $dataI . '", "%Y-%m-%d") and str_to_date("' . $dataF . '", "%Y-%m-%d")');
    $st12->execute();
    $rs_dez = $st12->fetch(PDO::FETCH_ASSOC);
    $dezembro = intval($rs_dez['num']);

    //número de agendamentos do mes de novembro
    $dataI = ($anoAtual - 1) . '-11-01';
    $dataF = ($anoAtual - 1) . '-11-31';
    $st11 = $pdo->prepare("select count(id) as num from tb_agendamentos where str_to_date(data, '%Y-%m-%d') between str_to_date('" . $dataI . "', '%Y-%m-%d') and str_to_date('" . $dataF . "', '%Y-%m-%d')");
    $st11->execute();
    $rs_nov = $st11->fetch(PDO::FETCH_ASSOC);
    $novembro = intval($rs_nov['num']);

    //número de agendamentos do mes de outubro
    $dataI = ($anoAtual - 1) . '-10-01';
    $dataF = ($anoAtual - 1) . '-10-31';
    $st10 = $pdo->prepare("select count(id) as num from tb_agendamentos where str_to_date(data, '%Y-%m-%d') between str_to_date('" . $dataI . "', '%Y-%m-%d') and str_to_date('" . $dataF . "', '%Y-%m-%d')");
    $st10->execute();
    $rs_out = $st10->fetch(PDO::FETCH_ASSOC);
    $outubro = intval($rs_out['num']);

    //número de agendamentos do mes de setembro
    $dataI = ($anoAtual - 1) . '-09-01';
    $dataF = ($anoAtual - 1) . '-09-31';
    $st9 = $pdo->prepare("select count(id) as num from tb_agendamentos where str_to_date(data, '%Y-%m-%d') between str_to_date('" . $dataI . "', '%Y-%m-%d') and str_to_date('" . $dataF . "', '%Y-%m-%d')");
    $st9->execute();
    $rs_set = $st9->fetch(PDO::FETCH_ASSOC);
    $setembro = intval($rs_set['num']);
} else if ($mesAtual == "03") {
    //número de agendamentos do mes de março
    $dataI = $anoAtual . '-03-01';
    $dataF = $anoAtual . '-03-31';
    $st3 = $pdo->prepare("select count(id) as num from tb_agendamentos where str_to_date(data, '%Y-%m-%d') between str_to_date('2017-03-01', '%Y-%m-%d') and str_to_date('2017-03-31', '%Y-%m-%d')");
    $st3->execute();
    $rs_marco = $st3->fetch(PDO::FETCH_ASSOC);
    $marco = intval($rs_marco['num']);

    //número de agendamentos do mes de fevereiro
    $dataI = $anoAtual . '-02-01';
    $dataF = $anoAtual . '-02-29';
    $st2 = $pdo->prepare("select count(id) as num from tb_agendamentos where str_to_date(data, '%Y-%m-%d') between str_to_date('" . $dataI . "', '%Y-%m-%d') and str_to_date('" . $dataF . "', '%Y-%m-%d')");
    $st2->execute();
    $rs_fev = $st2->fetch(PDO::FETCH_ASSOC);
    $fev = intval($rs_fev['num']);

    //número de agendamentos do mes de janeiro
    $dataI = $anoAtual . '-01-01';
    $dataF = $anoAtual . '-01-31';
    $st1 = $pdo->prepare('select count(id) as num from tb_agendamentos where str_to_date(data,"%Y-%m-%d") between str_to_date("' . $dataI . '", "%Y-%m-%d") and str_to_date("' . $dataF . '", "%Y-%m-%d")');
    $st1->execute();
    $rs_jan = $st1->fetch(PDO::FETCH_ASSOC);
    $jan = intval($rs_jan['num']);

    //número de agendamentos do mes de dezembro
    $dataI = ($anoAtual - 1) . '-12-01';
    $dataF = ($anoAtual - 1) . '-12-31';
    $st12 = $pdo->prepare('select count(id) as num from tb_agendamentos where str_to_date(data, "%Y-%m-%d") between str_to_date("' . $dataI . '", "%Y-%m-%d") and str_to_date("' . $dataF . '", "%Y-%m-%d")');
    $st12->execute();
    $rs_dez = $st12->fetch(PDO::FETCH_ASSOC);
    $dezembro = intval($rs_dez['num']);

    //número de agendamentos do mes de novembro
    $dataI = ($anoAtual - 1) . '-11-01';
    $dataF = ($anoAtual - 1) . '-11-31';
    $st11 = $pdo->prepare("select count(id) as num from tb_agendamentos where str_to_date(data, '%Y-%m-%d') between str_to_date('" . $dataI . "', '%Y-%m-%d') and str_to_date('" . $dataF . "', '%Y-%m-%d')");
    $st11->execute();
    $rs_nov = $st11->fetch(PDO::FETCH_ASSOC);
    $novembro = intval($rs_nov['num']);

    //número de agendamentos do mes de outubro
    $dataI = ($anoAtual - 1) . '-10-01';
    $dataF = ($anoAtual - 1) . '-10-31';
    $st10 = $pdo->prepare("select count(id) as num from tb_agendamentos where str_to_date(data, '%Y-%m-%d') between str_to_date('" . $dataI . "', '%Y-%m-%d') and str_to_date('" . $dataF . "', '%Y-%m-%d')");
    $st10->execute();
    $rs_out = $st10->fetch(PDO::FETCH_ASSOC);
    $outubro = intval($rs_out['num']);
} else if ($mesAtual == "04") {
    //número de agendamentos do mes de abril
    $dataI = $anoAtual . '-04-01';
    $dataF = $anoAtual . '-04-31';
    $st4 = $pdo->prepare("select count(id) as num from tb_agendamentos where str_to_date(data, '%Y-%m-%d') between str_to_date('2017-04-01', '%Y-%m-%d') and str_to_date('2017-04-31', '%Y-%m-%d')");
    $st4->execute();
    $rs_abril = $st4->fetch(PDO::FETCH_ASSOC);
    $abril = intval($rs_abril['num']);

    //número de agendamentos do mes de março
    $dataI = $anoAtual . '-03-01';
    $dataF = $anoAtual . '-03-31';
    $st3 = $pdo->prepare("select count(id) as num from tb_agendamentos where str_to_date(data, '%Y-%m-%d') between str_to_date('2017-03-01', '%Y-%m-%d') and str_to_date('2017-03-31', '%Y-%m-%d')");
    $st3->execute();
    $rs_marco = $st3->fetch(PDO::FETCH_ASSOC);
    $marco = intval($rs_marco['num']);

    //número de agendamentos do mes de fevereiro
    $dataI = $anoAtual . '-02-01';
    $dataF = $anoAtual . '-02-29';
    $st2 = $pdo->prepare("select count(id) as num from tb_agendamentos where str_to_date(data, '%Y-%m-%d') between str_to_date('" . $dataI . "', '%Y-%m-%d') and str_to_date('" . $dataF . "', '%Y-%m-%d')");
    $st2->execute();
    $rs_fev = $st2->fetch(PDO::FETCH_ASSOC);
    $fev = intval($rs_fev['num']);

    //número de agendamentos do mes de janeiro
    $dataI = $anoAtual . '-01-01';
    $dataF = $anoAtual . '-01-31';
    $st1 = $pdo->prepare('select count(id) as num from tb_agendamentos where str_to_date(data,"%Y-%m-%d") between str_to_date("' . $dataI . '", "%Y-%m-%d") and str_to_date("' . $dataF . '", "%Y-%m-%d")');
    $st1->execute();
    $rs_jan = $st1->fetch(PDO::FETCH_ASSOC);
    $jan = intval($rs_jan['num']);

    //número de agendamentos do mes de dezembro
    $dataI = ($anoAtual - 1) . '-12-01';
    $dataF = ($anoAtual - 1) . '-12-31';
    $st12 = $pdo->prepare('select count(id) as num from tb_agendamentos where str_to_date(data, "%Y-%m-%d") between str_to_date("' . $dataI . '", "%Y-%m-%d") and str_to_date("' . $dataF . '", "%Y-%m-%d")');
    $st12->execute();
    $rs_dez = $st12->fetch(PDO::FETCH_ASSOC);
    $dezembro = intval($rs_dez['num']);

    //número de agendamentos do mes de novembro
    $dataI = ($anoAtual - 1) . '-11-01';
    $dataF = ($anoAtual - 1) . '-11-31';
    $st11 = $pdo->prepare("select count(id) as num from tb_agendamentos where str_to_date(data, '%Y-%m-%d') between str_to_date('" . $dataI . "', '%Y-%m-%d') and str_to_date('" . $dataF . "', '%Y-%m-%d')");
    $st11->execute();
    $rs_nov = $st11->fetch(PDO::FETCH_ASSOC);
    $novembro = intval($rs_nov['num']);
} else if ($mesAtual == "05") {
    //número de agendamentos do mes de maio
    $dataI = $anoAtual . '-05-01';
    $dataF = $anoAtual . '-05-31';
    $st5 = $pdo->prepare("select count(id) as num from tb_agendamentos where str_to_date(data, '%Y-%m-%d') between str_to_date('2017-05-01', '%Y-%m-%d') and str_to_date('2017-05-31', '%Y-%m-%d')");
    $st5->execute();
    $rs_maio = $st5->fetch(PDO::FETCH_ASSOC);
    $maio = intval($rs_maio['num']);

    //número de agendamentos do mes de abril
    $dataI = $anoAtual . '-04-01';
    $dataF = $anoAtual . '-04-31';
    $st4 = $pdo->prepare("select count(id) as num from tb_agendamentos where str_to_date(data, '%Y-%m-%d') between str_to_date('2017-04-01', '%Y-%m-%d') and str_to_date('2017-04-31', '%Y-%m-%d')");
    $st4->execute();
    $rs_abril = $st4->fetch(PDO::FETCH_ASSOC);
    $abril = intval($rs_abril['num']);

    //número de agendamentos do mes de março
    $dataI = $anoAtual . '-03-01';
    $dataF = $anoAtual . '-03-31';
    $st3 = $pdo->prepare("select count(id) as num from tb_agendamentos where str_to_date(data, '%Y-%m-%d') between str_to_date('2017-03-01', '%Y-%m-%d') and str_to_date('2017-03-31', '%Y-%m-%d')");
    $st3->execute();
    $rs_marco = $st3->fetch(PDO::FETCH_ASSOC);
    $marco = intval($rs_marco['num']);

    //número de agendamentos do mes de fevereiro
    $dataI = $anoAtual . '-02-01';
    $dataF = $anoAtual . '-02-29';
    $st2 = $pdo->prepare("select count(id) as num from tb_agendamentos where str_to_date(data, '%Y-%m-%d') between str_to_date('" . $dataI . "', '%Y-%m-%d') and str_to_date('" . $dataF . "', '%Y-%m-%d')");
    $st2->execute();
    $rs_fev = $st2->fetch(PDO::FETCH_ASSOC);
    $fev = intval($rs_fev['num']);

    //número de agendamentos do mes de janeiro
    $dataI = $anoAtual . '-01-01';
    $dataF = $anoAtual . '-01-31';
    $st1 = $pdo->prepare('select count(id) as num from tb_agendamentos where str_to_date(data,"%Y-%m-%d") between str_to_date("' . $dataI . '", "%Y-%m-%d") and str_to_date("' . $dataF . '", "%Y-%m-%d")');
    $st1->execute();
    $rs_jan = $st1->fetch(PDO::FETCH_ASSOC);
    $jan = intval($rs_jan['num']);

    //número de agendamentos do mes de dezembro
    $dataI = ($anoAtual - 1) . '-12-01';
    $dataF = ($anoAtual - 1) . '-12-31';
    $st12 = $pdo->prepare('select count(id) as num from tb_agendamentos where str_to_date(data, "%Y-%m-%d") between str_to_date("' . $dataI . '", "%Y-%m-%d") and str_to_date("' . $dataF . '", "%Y-%m-%d")');
    $st12->execute();
    $rs_dez = $st12->fetch(PDO::FETCH_ASSOC);
    $dezembro = intval($rs_dez['num']);
} else if ($mesAtual == "06") {
    //número de agendamentos do mes de junho
    $dataI = $anoAtual . '-06-01';
    $dataF = $anoAtual . '-06-31';
    $st6 = $pdo->prepare("select count(id) as num from tb_agendamentos where str_to_date(data, '%Y-%m-%d') between str_to_date('2017-06-01', '%Y-%m-%d') and str_to_date('2017-06-31', '%Y-%m-%d')");
    $st6->execute();
    $rs_junho = $st6->fetch(PDO::FETCH_ASSOC);
    $junho = intval($rs_junho['num']);

    //número de agendamentos do mes de maio
    $dataI = $anoAtual . '-05-01';
    $dataF = $anoAtual . '-05-31';
    $st5 = $pdo->prepare("select count(id) as num from tb_agendamentos where str_to_date(data, '%Y-%m-%d') between str_to_date('2017-05-01', '%Y-%m-%d') and str_to_date('2017-05-31', '%Y-%m-%d')");
    $st5->execute();
    $rs_maio = $st5->fetch(PDO::FETCH_ASSOC);
    $maio = intval($rs_maio['num']);

    //número de agendamentos do mes de abril
    $dataI = $anoAtual . '-04-01';
    $dataF = $anoAtual . '-04-31';
    $st4 = $pdo->prepare("select count(id) as num from tb_agendamentos where str_to_date(data, '%Y-%m-%d') between str_to_date('2017-04-01', '%Y-%m-%d') and str_to_date('2017-04-31', '%Y-%m-%d')");
    $st4->execute();
    $rs_abril = $st4->fetch(PDO::FETCH_ASSOC);
    $abril = intval($rs_abril['num']);

    //número de agendamentos do mes de março
    $dataI = $anoAtual . '-03-01';
    $dataF = $anoAtual . '-03-31';
    $st3 = $pdo->prepare("select count(id) as num from tb_agendamentos where str_to_date(data, '%Y-%m-%d') between str_to_date('2017-03-01', '%Y-%m-%d') and str_to_date('2017-03-31', '%Y-%m-%d')");
    $st3->execute();
    $rs_marco = $st3->fetch(PDO::FETCH_ASSOC);
    $marco = intval($rs_marco['num']);

    //número de agendamentos do mes de fevereiro
    $dataI = $anoAtual . '-02-01';
    $dataF = $anoAtual . '-02-29';
    $st2 = $pdo->prepare("select count(id) as num from tb_agendamentos where str_to_date(data, '%Y-%m-%d') between str_to_date('" . $dataI . "', '%Y-%m-%d') and str_to_date('" . $dataF . "', '%Y-%m-%d')");
    $st2->execute();
    $rs_fev = $st2->fetch(PDO::FETCH_ASSOC);
    $fev = intval($rs_fev['num']);

    //número de agendamentos do mes de janeiro
    $dataI = $anoAtual . '-01-01';
    $dataF = $anoAtual . '-01-31';
    $st1 = $pdo->prepare('select count(id) as num from tb_agendamentos where str_to_date(data,"%Y-%m-%d") between str_to_date("' . $dataI . '", "%Y-%m-%d") and str_to_date("' . $dataF . '", "%Y-%m-%d")');
    $st1->execute();
    $rs_jan = $st1->fetch(PDO::FETCH_ASSOC);
    $jan = intval($rs_jan['num']);
} else {
    //número de agendamentos do mes de janeiro
    $dataI = $anoAtual . '-01-01';
    $dataF = $anoAtual . '-01-31';
    $st1 = $pdo->prepare('select count(id) as num from tb_agendamentos where str_to_date(data,"%Y-%m-%d") between str_to_date("' . $dataI . '", "%Y-%m-%d") and str_to_date("' . $dataF . '", "%Y-%m-%d")');
    $st1->execute();
    $rs_jan = $st1->fetch(PDO::FETCH_ASSOC);
    $jan = intval($rs_jan['num']);
    
    //número de agendamentos do mes de fevereiro
    $dataI = $anoAtual . '-02-01';
    $dataF = $anoAtual . '-02-29';
    $st2 = $pdo->prepare("select count(id) as num from tb_agendamentos where str_to_date(data, '%Y-%m-%d') between str_to_date('2017-02-01', '%Y-%m-%d') and str_to_date('2017-02-29', '%Y-%m-%d')");
    $st2->execute();
    $rs_fev = $st2->fetch(PDO::FETCH_ASSOC);
    $fev = intval($rs_fev['num']);

    //número de agendamentos do mes de março
    $dataI = $anoAtual . '-03-01';
    $dataF = $anoAtual . '-03-31';
    $st3 = $pdo->prepare("select count(id) as num from tb_agendamentos where str_to_date(data, '%Y-%m-%d') between str_to_date('2017-03-01', '%Y-%m-%d') and str_to_date('2017-03-31', '%Y-%m-%d')");
    $st3->execute();
    $rs_marco = $st3->fetch(PDO::FETCH_ASSOC);
    $marco = intval($rs_marco['num']);

    //número de agendamentos do mes de abril
    $dataI = $anoAtual . '-04-01';
    $dataF = $anoAtual . '-04-31';
    $st4 = $pdo->prepare("select count(id) as num from tb_agendamentos where str_to_date(data, '%Y-%m-%d') between str_to_date('2017-04-01', '%Y-%m-%d') and str_to_date('2017-04-31', '%Y-%m-%d')");
    $st4->execute();
    $rs_abril = $st4->fetch(PDO::FETCH_ASSOC);
    $abril = intval($rs_abril['num']);

    //número de agendamentos do mes de maio
    $dataI = $anoAtual . '-05-01';
    $dataF = $anoAtual . '-05-31';
    $st5 = $pdo->prepare("select count(id) as num from tb_agendamentos where str_to_date(data, '%Y-%m-%d') between str_to_date('2017-05-01', '%Y-%m-%d') and str_to_date('2017-05-31', '%Y-%m-%d')");
    $st5->execute();
    $rs_maio = $st5->fetch(PDO::FETCH_ASSOC);
    $maio = intval($rs_maio['num']);

    //número de agendamentos do mes de junho
    $dataI = $anoAtual . '-06-01';
    $dataF = $anoAtual . '-06-31';
    $st6 = $pdo->prepare("select count(id) as num from tb_agendamentos where str_to_date(data, '%Y-%m-%d') between str_to_date('2017-06-01', '%Y-%m-%d') and str_to_date('2017-06-31', '%Y-%m-%d')");
    $st6->execute();
    $rs_junho = $st6->fetch(PDO::FETCH_ASSOC);
    $junho = intval($rs_junho['num']);

    //número de agendamentos do mes de julho
    $dataI = $anoAtual . '-07-01';
    $dataF = $anoAtual . '-07-31';
    $st7 = $pdo->prepare("select count(id) as num from tb_agendamentos where str_to_date(data, '%Y-%m-%d') between str_to_date('2017-07-01', '%Y-%m-%d') and str_to_date('2017-07-31', '%Y-%m-%d')");
    $st7->execute();
    $rs_julho = $st7->fetch(PDO::FETCH_ASSOC);
    $julho = intval($rs_julho['num']);

    //número de agendamentos do mes de agosto
    $dataI = $anoAtual . '-08-01';
    $dataF = $anoAtual . '-08-31';
    $st8 = $pdo->prepare("select count(id) as num from tb_agendamentos where str_to_date(data, '%Y-%m-%d') between str_to_date('2017-08-01', '%Y-%m-%d') and str_to_date('2017-08-31', '%Y-%m-%d')");
    $st8->execute();
    $rs_agosto = $st8->fetch(PDO::FETCH_ASSOC);
    $agosto = intval($rs_agosto['num']);

    //número de agendamentos do mes de setembro
    $dataI = $anoAtual . '-09-01';
    $dataF = $anoAtual . '-09-31';
    $st9 = $pdo->prepare("select count(id) as num from tb_agendamentos where str_to_date(data, '%Y-%m-%d') between str_to_date('2017-09-01', '%Y-%m-%d') and str_to_date('2017-09-31', '%Y-%m-%d')");
    $st9->execute();
    $rs_set = $st9->fetch(PDO::FETCH_ASSOC);
    $setembro = intval($rs_set['num']);

    //número de agendamentos do mes de outubro
    $dataI = $anoAtual . '-10-01';
    $dataF = $anoAtual . '-10-31';
    $st10 = $pdo->prepare("select count(id) as num from tb_agendamentos where str_to_date(data, '%Y-%m-%d') between str_to_date('2017-10-01', '%Y-%m-%d') and str_to_date('2017-10-31', '%Y-%m-%d')");
    $st10->execute();
    $rs_out = $st10->fetch(PDO::FETCH_ASSOC);
    $outubro = intval($rs_out['num']);

    //número de agendamentos do mes de novembro
    $dataI = $anoAtual . '-11-01';
    $dataF = $anoAtual . '-11-31';
    $st11 = $pdo->prepare("select count(id) as num from tb_agendamentos where str_to_date(data, '%Y-%m-%d') between str_to_date('2017-11-01', '%Y-%m-%d') and str_to_date('2017-11-31', '%Y-%m-%d')");
    $st11->execute();
    $rs_nov = $st11->fetch(PDO::FETCH_ASSOC);
    $novembro = intval($rs_nov['num']);

    //número de agendamentos do mes de dezembro
    $dataI = $anoAtual . '-12-01';
    $dataF = $anoAtual . '-12-31';
    $st12 = $pdo->prepare("select count(id) as num from tb_agendamentos where str_to_date(data, '%Y-%m-%d') between str_to_date('2017-12-01', '%Y-%m-%d') and str_to_date('2017-12-31', '%Y-%m-%d')");
    $st12->execute();
    $rs_dez = $st12->fetch(PDO::FETCH_ASSOC);
    $dezembro = intval($rs_dez['num']);
}

