<?php

session_start();

include_once '../php/conexao.php';
require_once("../mpdf/mpdf.php");
include_once '../php/Agendamentos.class.php';

$mpdf = new mPDF();
$agenda = new Agendamentos();

$data_inicial = $_POST['dt_inicial'];
$data_final = $_POST['dt_final'];
$curso = $_POST['curso'];

$stmt1 = $pdo->prepare("select us.fullname, cat.name, cat.parent from vw_cursos us, vw_categorias cat where us.id_course = :curso and cat.id_category = us.category");
$stmt1->bindValue(":curso", $curso);
$stmt1->execute();
$rs_curso = $stmt1->fetch(PDO::FETCH_ASSOC);

//busca categoria pai
$st2 = $pdo->prepare("select * from vw_categorias where id_category = :parent");
$st2->bindValue(":parent", $rs_curso['parent']);
$st2->execute();
$cat_pai = $st2->fetch(PDO::FETCH_ASSOC);

$mpdf->SetHTMLFooter('<hr /><br><i>NEAD Unicatólica - UniAgendamentos 1.0 | Página {PAGENO} de {nb} </i> ');
$mpdf->WriteHTML('<html>
    <head>
        <meta charset="UTF-8">
        <title>Relatório de Agendamentos</title>
        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="../css/componentes.css">
    </head>
    <body>
    <center>    
            <img src="../images/Logo-fcrs.png" width="200" height="50" style="float: left;">
            <img src="../images/nead-logo.png" width="120" height="65" style="float: right;">
            <br><br><br><br>
            <hr />
            <span class="fs fs-24">Relatório de Agendamentos</span><br>
            <span class="fs fs-14">Categoria: ' . utf8_encode($cat_pai['name']) . '</span><br>
            <span class="fs fs-14">Curso: ' . utf8_encode($rs_curso['fullname']) . '</span><br>
            <span class="fs fs-14">de ' . date('d/m/Y', strtotime($data_inicial)) . ' até ' . date('d/m/Y', strtotime($data_final)) . '</span>    
        </center>
        ');

$stmt3 = $pdo->prepare("select hm.monitor_id, us.firstname from tb_horarios_monitor hm, vw_usuarios us where hm.curso_id = :curso and hm.monitor_id = us.id");
$stmt3->bindValue(":curso", $curso);
$stmt3->execute();
while ($mon = $stmt3->fetch(PDO::FETCH_ASSOC)) {
    $mpdf->WriteHTML('<h3>' . utf8_encode($mon['firstname']) . '</h3>');
    $mpdf->WriteHTML('<div class="tb"><table><tr><th>Matrícula</th><th width="375">Nome do Aluno</th><th>Agendado para</th></tr>');
    
    $stmt2 = $pdo->prepare("select us.firstname, ag.horario, us.username from tb_agendamentos ag, vw_usuarios us where str_to_date(ag.data, '%Y-%m-%d') between str_to_date(:data_inicial, '%Y-%m-%d') and str_to_date(:data_final, '%Y-%m-%d') and us.id = ag.aluno_id and ag.curso_id = :curso and ag.monitor_id = :monitor order by str_to_date(ag.data, '%Y-%m-%d')");
    $stmt2->bindValue(":data_inicial", $data_inicial);
    $stmt2->bindValue(":data_final", $data_final);
    $stmt2->bindValue(":curso", $curso);
    $stmt2->bindValue(":monitor", $mon['monitor_id']);
    $stmt2->execute();
    
    $cont = 0;
    while ($conn = $stmt2->fetch(PDO::FETCH_ASSOC)) {
        $cont++;
        $mpdf->WriteHTML('<tr><td>' . utf8_encode($conn['username']) . '</td><td>' . utf8_encode($conn['firstname']) . '</td><td>' . utf8_encode($conn['horario']) . '</td></tr>');
    }
    $mpdf->WriteHTML('</table></div><br>');
    $mpdf->WriteHTML('<div style="text-align:right;font-size:14px;width:100%;">Qtde. de Agendamentos: ' . $cont . '</div>');
}
$mpdf->WriteHTML('</body></html>');

$mpdf->Output("Relatório de Agendamentos - " . $rs_curso['fullname'] . ".pdf", "I");
