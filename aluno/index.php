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

$pag = "";
?>
<html>
    <?php include_once('./imports/import_head.php'); ?>
    <body>
        <?php
        include_once('./imports/import_header.php');
        include_once('./imports/import_menu.php');
        ?>
        <div class="container-fluid">
            <section class="main-content">
                <center>
                    <div class="form-group">
                        <label>Selecione um Curso/Disciplina:</label>
                        <select class="form-control form-tutor" onchange="listaMonitores(this.value);">
                            <option value="">Selecione um...</option>
                            <?php
                            while ($con_curso = $st2->fetch(PDO::FETCH_ASSOC)) {
                                echo '<option value="' . $con_curso['id_course'] . '">' . utf8_encode($con_curso['fullname']) . '</option>';
                            }
                            ?>
                        </select>
                    </div>

                    <p class="h4">Tutores Disponíveis</p>
                    <div class="monitores"></div>
                </center>
            </section>
        </div>
        <?php include_once('./imports/import_footer.php'); ?>
        <script src="./functionsJS/agendamento.js"></script>
    </body>
</html>
