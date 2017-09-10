<?php
include_once './php/valida_usuario.php';
include_once('./php/hora_atual.php');
include './php/DataHoraAtual.php';
include_once('./php/mes_por_extenso.php');
if (isset($_SESSION['monitor_selecionado'])) {
    if ($_SESSION['monitor_selecionado'] == "") {
        header("Location:index.php");
    }
} else {
    header("Location:index.php");
}
$usuario_logado = $_SESSION['aluno'];

$semana = array(
    'en' => array('/Sun/', '/Mon/', '/Tue/', '/Wed/', '/Thu/', '/Fri/', '/Sat/', '/Jan/', '/Feb/', '/Mar/', '/Apr/', '/May/', '/Jun/', '/Jul/', '/Aug/', '/Sep/', '/Oct/', '/Nov/', '/Dec/'),
    'short' => array('Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sab', 'Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez')
);
unset($_SESSION['confirm']);
$pag = 'opt';
?>

<!DOCTYPE html>
<html>
    <?php include_once('./imports/import_head.php'); ?>
    <body>
        <?php
        include_once('./imports/import_header.php');
        include_once('./imports/import_menu.php');
        ?>
        <div class="container-fluid">
            <section class="main-content">
                <div class="title">Agendar Horário de Tutoria</div>
                <div class="alert ocultar" role="alert">
                    <button type="button" class="close" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <span class="alert-msg"></span>
                </div>
                <center>
                    <div class="grade1">
                        <?php include_once './grade_um.php'; ?>
                    </div>

                    <div class="grade2">
                        <?php include_once './grade_dois.php'; ?>
                    </div>

                    <div class="horarios">
                        <?php
                        include_once ('../php/conexao.php');
                        $st01 = $pdo->prepare("select * from tb_horarios_monitor hm, vw_usuarios us, vw_cursos c, vw_categorias cat where hm.monitor_id = :monitor and us.id = hm.monitor_id and c.id_course = hm.curso_id and c.category = cat.id_category");
                        $st01->bindValue(":monitor", $_SESSION['monitor_selecionado']);
                        $st01->execute();
                        $con = $st01->fetch(PDO::FETCH_ASSOC);

                        $_SESSION['monitor_selecionado2'] = $con['firstname'];
                        $_SESSION['disciplina'] = $con['fullname'];
                        $_SESSION['nome_categoria'] = $con['name'];
                        ?>
                        <center>
                            <div class="horario1">
                                <?php include_once('./grade_horarios.php'); ?>
                            </div>
                        </center>
                    </div>
                </center>

            </section>
        </div>
        <?php include_once('./imports/import_footer.php'); ?>
        <script src="./functionsJS/agendamento.js"></script>
        <script>
            function pintar(dia, num, dia_atual) {

                $(".dia1").css("background-color", "#777");
                $(".dia1").removeClass("slt");
                $(dia).css("background-color", "#eb6c05");
                $(dia).addClass("slt");
                var nome_dia = $('.slt').text();

                if (nome_dia.indexOf("Seg") !== -1) {
                    $(".ter, .qua, .qui, .sex, .sab, .dom").css("display", "none");
                    $(".seg").css("display", "inherit");
                } else if (nome_dia.indexOf("Ter") !== -1) {
                    $(".seg, .qua, .qui, .sex, .sab, .dom").css("display", "none");
                    $(".ter").css("display", "inherit");
                } else if (nome_dia.indexOf("Qua") !== -1) {
                    $(".seg, .ter, .qui, .sex, .sab, .dom").css("display", "none");
                    $(".qua").css("display", "inherit");
                } else if (nome_dia.indexOf("Qui") !== -1) {
                    $(".seg, .ter, .qua, .sex, .sab, .dom").css("display", "none");
                    $(".qui").css("display", "inherit");
                } else if (nome_dia.indexOf("Sex") !== -1) {
                    $(".seg, .ter, .qua, .qui, .sab, .dom").css("display", "none");
                    $(".sex").css("display", "inherit");
                } else if (nome_dia.indexOf("Sab") !== -1) {
                    $(".seg, .ter, .qua, .qui, .sex, .dom").css("display", "none");
                    $(".sab").css("display", "inherit");
                } else if (nome_dia.indexOf("Dom") !== -1) {
                    $(".seg, .ter, .qua, .qui, .sex, .sab").css("display", "none");
                    $(".dom").css("display", "inherit");
                }
                var mes_marcado;

                if (num > dia_atual) {
                    mes_marcado = "<?php echo $mes[intval(date('m', strtotime($data_atual_servidor)))]; ?>";
                    document.form_horarios.mes_num.value = "<?php echo date('m'); ?>";
                } else {
                    mes_marcado = "<?php echo (intval(date('m')) == 12) ? 'Janeiro' : $mes[intval(date('m') + 1)]; ?>";
                    document.form_horarios.mes_num.value = "<?php echo (intval(date('m')) == 12) ? 01 : intval(date('m')) + 1; ?>";
                }
                if (num > 9) {
                    document.form_horarios.dia_marcado.value = num;
                } else {
                    document.form_horarios.dia_marcado.value = "0" + num;
                }
                document.form_horarios.mes_marcado.value = mes_marcado;
            }
        </script>
    </body>
</html>