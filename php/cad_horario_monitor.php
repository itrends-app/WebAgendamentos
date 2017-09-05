<?php

session_start();

$curso = $_SESSION['curso'];
$monitor = $_SESSION['monitor'];
$segunda = $_SESSION['segunda'];
$seg_ini = $_SESSION['seg_ini'];
$seg_fim = $_SESSION['seg_fim'];
$terca = $_SESSION['terca'];
$ter_ini = $_SESSION['ter_ini'];
$ter_fim = $_SESSION['ter_fim'];
$quarta = $_SESSION['quarta'];
$qua_ini = $_SESSION['qua_ini'];
$qua_fim = $_SESSION['qua_fim'];
$quinta = $_SESSION['quinta'];
$qui_ini = $_SESSION['qui_ini'];
$qui_fim = $_SESSION['qui_fim'];
$sexta = $_SESSION['sexta'];
$sex_ini = $_SESSION['sex_ini'];
$sex_fim = $_SESSION['sex_fim'];
$sabado = $_SESSION['sabado'];
$sab_ini = $_SESSION['sab_ini'];
$sab_fim = $_SESSION['sab_fim'];
$domingo = $_SESSION['domingo'];
$dom_ini = $_SESSION['dom_ini'];
$dom_fim = $_SESSION['dom_fim'];
$grade = $_SESSION['grade'];
$agend_min = $_SESSION['agend_min'];
$agend_padrao = $_SESSION['agend_padrao'];
$agend_max = $_SESSION['agend_max'];
$pausa = $_SESSION['pausa'];
$retorno = $_SESSION['retorno'];
$aviso_min = $_SESSION['aviso_min'];
$und_tempo = $_SESSION['und_tempo'];
$limite = $_SESSION['limite'];
$status = $_SESSION['status'];

include_once('./conexao.php');
try {
    $pdo->query("insert into tb_horarios_monitor (curso_id ,monitor_id, segunda, seg_ini, seg_fim, terca, ter_ini, ter_fim, quarta, qua_ini, qua_fim, quinta, "
        . "qui_ini, qui_fim, sexta, sex_ini, sex_fim, sabado, sab_ini, sab_fim, domingo, dom_ini, dom_fim, exibicao_grade, agend_minimo, agend_padrao, "
        . "agend_maximo, pausa, retorno, aviso_minimo, und_tempo, limite, status) values('$curso' ,'$monitor', '$segunda', '$seg_ini', '$seg_fim', '$terca', '"
        . "$ter_ini', '$ter_fim', '$quarta', '$qua_ini', '$qua_fim', '$quinta', '$qui_ini', '$qui_fim', '$sexta', '$sex_ini', '$sex_fim', '$sabado', "
        . "'$sab_ini', '$sab_fim', '$domingo', '$dom_ini', '$dom_fim', '$grade', '$agend_min', '$agend_padrao', '$agend_max', '$pausa', '$retorno', "
        . "'$aviso_min', '$und_tempo', '$limite', '$status')");

} catch (PDOException $ex) {
    
}
try {
    $st2 = $pdo->prepare("insert into tb_monitor (monitor_id, nome_monitor) select us.id,"
            . " us.firstname from vw_usuarios us where us.id = :id");
    $st2->bindValue(":id", $monitor);
    $st2->execute();
    include_once './limpa_sessao.php';
    echo "ok";
} catch (PDOException $ex) {
    echo $ex->getMessage();
}