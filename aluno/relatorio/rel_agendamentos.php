<?php

session_name('aluno');
session_start();

include_once '../../php/conexao.php';
require_once("../../mpdf/mpdf.php");
$mpdf = new mPDF();
$data_inicial = $_POST['dt_inicial'];
$data_final = $_POST['dt_final'];

$mpdf->SetHTMLFooter('<hr /><br><i>NEAD Unicatólica - UniAgendamentos 1.0 | Página {PAGENO} de {nb} </i> ');
$mpdf->WriteHTML('<html>
    <head>
        <meta charset="UTF-8">
        <title>Relatório de Agendamentos</title>
        <link rel="stylesheet" href="../../css/style.css">
        <link rel="stylesheet" href="../../css/menu.css">
        <link rel="stylesheet" href="../../css/componentes.css">
        <link rel="stylesheet" href="../../aluno/css/aluno.css">
        <link rel="stylesheet" href="../../css/menu-mobile.css" media="(max-width:760px)">
    </head>
    <body>
        <img src="../images/Logo-fcrs.png" width="200" height="50" style="float: left;">
        <img src="../images/nead-logo.png" width="120" height="65" style="float: right;">
        <br><br><br><br>
        <hr />

        <center>
            <span class="fs fs-20">Relatório de Agendamentos</span><br>
            <span class="fs fs-14">de '.date('d/m/Y', strtotime($data_inicial)).' até '.date('d/m/Y', strtotime($data_final)).'
        </center>');
$mpdf->WriteHTML('<div class="tb"><table><tr><th>Matrícula</th><th>Nome do Aluno</th><th>Agendado para</th></tr>');
$stmt = $pdo->prepare("select * from tb_agendamentos ag, vw_usuarios us where ag.aluno_id = :aluno and str_to_date(ag.data, '%Y-%m-%d') between str_to_date(:data_inicial, '%Y-%m-%d') and str_to_date(:data_final, '%Y-%m-%d') and us.id = ag.monitor_id");
$stmt->bindValue(":aluno", $_SESSION['aluno']);
$stmt->bindValue(":data_inicial", $data_inicial);
$stmt->bindValue(":data_final", $data_final);
$stmt->execute();

while ($conn = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $mpdf->WriteHTML('<tr><td>'.utf8_encode($conn['username']).'</td><td>'.utf8_encode($conn['firstname']).'</td><td>'.utf8_encode($conn['horario']).'</td></tr>');
}
$mpdf->WriteHTML('</table></div></body></html>');

$mpdf->Output("Relatório - rel_agendamentos.pdf", 'i');


