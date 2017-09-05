<?php
include_once './php/valida_usuario.php';
include_once('./php/hora_atual.php');
include './php/DataHoraAtual.php';
include_once('./php/mes_por_extenso.php');
if(isset($_SESSION['monitor_selecionado'])) {
    if($_SESSION['monitor_selecionado'] == "") {
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
?>

<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="UTF-8">
        <title>Agendamentos</title>
        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="../css/menu.css">
        <link rel="stylesheet" href="../css/bootstrap.css">
        <link rel="stylesheet" href="../css/componentes.css">
        <link rel="stylesheet" href="css/aluno.css">
        <link rel="stylesheet" href="../css/menu-mobile.css" media="(max-width:760px)">
        <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script type="text/javascript" src="../js/jquery-1.11.1.min.js"></script>
    </head>
    <body>

        <div class="container">

            <?php
            include_once('../layout/header.php');
            include_once './btn-sair.php';
            
            ?>
            <?php include_once './layout/menu.php';?>
            <center>
                <div class="corpo">
                    <!--Mensagem de retorno-->
                    <div class="mensagem">
                        <span class="fs fs-16 c-white"></span>
                        <a href="#" onclick="fecharMsgErro();" style="float:right;"><i class="fa fa-close c-white"></i></a>
                    </div>

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
                </div>
            </center>

            <?php
            include_once('../layout/footer.php');
            ?>
        </div>

    </body>
</html>
<script type="text/javascript">

    $(document).ready(function () {
        $('.grade2').fadeOut(0);
        $('.proximo').click(function () {
            var cont = 2;
            if (cont === 2) {
                $('.grade1').css("display", "none");
                $('.grade2').css("display", "block");
            }
        });

        $('.anterior').click(function () {
            var cont = 1;
            if (cont === 1) {
                $('.grade2').css("display", "none");
                $('.grade1').css("display", "block");
            }
        });

        $('.cad_horario').click(function () {
            var str = $(this).text();
            document.form_horarios.hora_marcada.value = str.replace(/\s/g, '');

            var dados = $("#form-horario").serialize();
            $.ajax({
                type: 'post',
                dataType: 'html',
                url: './php/armazena_dados.php',
                data: dados,
                success: function (dados) {
                    if (dados === "ok") {
                        window.location.href = "confirmar_agendamento.php";
                    } else {
                        $('.mensagem span').html('Não há mais vagas disponíveis neste horário, por favor selecione um novo horário!');
                        $('.mensagem').css('display', 'block').addClass('bg-red-60').css('text-align', 'left');
                    }
                }
            });
        });
    });

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

