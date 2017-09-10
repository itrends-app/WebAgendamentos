<!DOCTYPE html>
<?php
include_once './php/valida_usuario.php';
include_once('../php/conexao.php');
$_SESSION['monitor_selecionado'] = "";

//$st1 = $pdo->prepare("select * from tb_horarios_monitor hm, vw_usuarios us where hm.curso_id = :curso and hm.monitor_id = us.id and hm.status = 'Habilitado' and hm.monitor_id != :aluno");
//$st1->bindValue(":curso", $_SESSION['sel_curso']);
//$st1->bindValue(":aluno", $_SESSION['aluno']);
//$st1->execute();

$st2 = $pdo->prepare("SELECT c.id_course, c.fullname FROM vw_atribuicoes rs INNER JOIN vw_contexto e ON rs.contextid = e.id  INNER JOIN  vw_cursos c ON c.id_course = e.instanceid WHERE e.contextlevel = 50 AND rs.roleid = 5 AND rs.userid = :id group by c.id_course");
$st2->bindValue(":id", $_SESSION['aluno']);
$st2->execute();
?>
<html>
    <!--    <head>
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta charset="UTF-8">
            <link rel="stylesheet" href="../css/style.css">
            <link rel="stylesheet" href="../css/menu.css">
            <link rel="stylesheet" href="../css/bootstrap.css">
            <link rel="stylesheet" href="../css/componentes.css">
            <link rel="stylesheet" href="css/aluno.css">
            <link rel="stylesheet" href="../css/menu-mobile.css" media="(max-width:760px)">
            <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
            <script type="text/javascript" src="../js/jquery-1.11.1.min.js"></script>
            <script src='https://www.google.com/recaptcha/api.js?hl=pt-BR'></script>
        </head>-->
    <?php include_once('./imports/import_head.php'); ?>
    <body>
        <?php
        include_once('./imports/import_header.php');
        include_once('./imports/import_menu.php');
        ?>
        <div class="container-fluid">
            <section class="main-content">
                <select class="wdt-400" onchange="listaMonitores(this.value);">
                    <option value="">Selecione um...</option>
                    <?php
                    while ($con_curso = $st2->fetch(PDO::FETCH_ASSOC)) {
                        echo '<option value="' . $con_curso['id_course'] . '">' . utf8_encode($con_curso['fullname']) . '</option>';
                    }
                    ?>
                </select>
                <div class="monitores">
                    
                </div>
            </section>
        </div>
        <?php include_once('./imports/import_footer.php'); ?>
        <script src="./functionsJS/agendamento.js"></script>
    </body>
</html>
