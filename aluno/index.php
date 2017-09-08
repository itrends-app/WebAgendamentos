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
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="UTF-8">
        <title><?php include_once '../layout/AplicationName.php'; ?></title>
        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="../css/menu.css">
        <link rel="stylesheet" href="../css/bootstrap.css">
        <link rel="stylesheet" href="../css/componentes.css">
        <link rel="stylesheet" href="css/aluno.css">
        <link rel="stylesheet" href="../css/menu-mobile.css" media="(max-width:760px)">
        <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script type="text/javascript" src="../js/jquery-1.11.1.min.js"></script>
        <script src='https://www.google.com/recaptcha/api.js?hl=pt-BR'></script>
    </head>
    <body>
        <div class="container">

            <?php
            include_once '../layout/header.php';
            include_once './btn-sair.php';
            ?>
            <?php include_once './layout/menu.php';?>
            <center>
                <div class="corpo">
                    <select class="wdt-400" onchange="listaMonitores(this.value);">
                        <option value="">Selecione um...</option>
                        <?php
                        while ($con_curso = $st2->fetch(PDO::FETCH_ASSOC)) {
                            echo '<option value="' . $con_curso['id_course'] . '">' . utf8_encode($con_curso['fullname']) . '</option>';
                        }
                        ?>
                    </select>
                    <div class="mg-top-20"></div>

                    <span class="fs fs-20">Monitores</span><br>
                    <div class="monitores">

                    </div>
                </div>
            </center>
            <?php include_once '../layout/footer.php'; ?>
        </div>
    </body>
</html>
<script type="text/javascript">
    function selecionarMonitor(monitor) {
        location.href = "./php/seleciona_monitor.php?monitor=" + monitor;
    }
    function listaMonitores(id) {
        $.ajax({
            type: 'post',
            dataType: 'json',
            url: './php/ListaMonitores.php',
            data: {curso: id},
            success: function (dados) {
                if (dados === "not") {

                } else {
                    for (var i = 0; i < dados.length; i++) {
                        $('.monitores').append('<div class="monitor"><a href="#" onclick="selecionarMonitor(' + dados[i].monitor_id + ');">'+dados[i].firstname+'</a></div>');
                    }
                }
            }
        });
    }
</script>
