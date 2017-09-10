<!DOCTYPE html>
<!--pagina admin-->
<html>
    <?php
//    include_once './php/SessaoUsuario.php';
    $_SESSION['hora_marcada'] = "";
    include_once './aluno/php/mes_por_extenso.php';
    include_once('./php/conexao.php');
    include_once './php/DataHoraAtual.php';

    $semana = array(
        'en' => array('/Sun/', '/Mon/', '/Tue/', '/Wed/', '/Thu/', '/Fri/', '/Sat/', '/Jan/', '/Feb/', '/Mar/', '/Apr/', '/May/', '/Jun/', '/Jul/', '/Aug/', '/Sep/', '/Oct/', '/Nov/', '/Dec/'),
        'short' => array('Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sab', 'Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez')
    );
    //pega os dados do agendamento através do id do banco
    try {
        $st = $pdo->prepare("select * from tb_agendamentos where id = :agend");
        $st->bindValue(":agend", $_SESSION['agendamento_id']);
        $st->execute();
        $con_seleciona_agendamento = $st->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    ?>
    <?php include_once('./imports/import_head.php'); ?>
    <body>
        <?php include_once('./imports/import_header.php'); ?>
        <div class="container-fluid">
            <section class="main-content">
                <div class="title">Editar Agendamento</div>
                <div class="row">
                    <div class="col-md-12">
                        <label class="text-capitalize">Agendado para:</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <span class="text-capitalize"><?php echo utf8_encode($con_seleciona_agendamento['horario']); ?></span>
                    </div>
                </div>
                <div class="ln-tracejada-1"></div>
                <div class="mg-top-10"></div>
                <span class="fs fs-18 c-gray-50">Mudar para:</span>
                <div class="mg-top-5"></div>

                <div class="grade1">
                    <center>
                        <?php include_once './edita_grade_um.php'; ?>
                    </center>
                </div>

                <div class="grade2">
                    <center>
                        <?php include_once './edita_grade_dois.php'; ?>
                    </center>
                </div>
                <center>
                    <div class="horarios" id="hour">
                        <?php
//                                    include_once ('./php/conexao.php');
                        $st2 = $pdo->prepare("select * from tb_horarios_monitor hm, vw_usuarios us, vw_cursos c, vw_categorias cat where hm.monitor_id = :monitor and us.id = hm.monitor_id and c.id_course = hm.curso_id and c.category = cat.id_category");
                        $st2->bindValue(":monitor", $_SESSION['monitor_id']);
                        $st2->execute();
                        $con = $st2->fetch(PDO::FETCH_ASSOC);

                        $_SESSION['monitor_selecionado2'] = $con['firstname'];
                        $_SESSION['disciplina'] = $con['fullname'];
                        $_SESSION['nome_categoria'] = $con['name'];
                        ?>
                        <center>
                            <div class="horario1">
                                <?php include_once('./edita_grade_horarios.php'); ?>
                            </div>
                        </center>
                    </div>
                </center>


                <div class="mg-top-20"></div>
                <form method="post" name="form_horarios" id="form-horario" action="" class="ocultar">
                    <input type="text" name="hora_marcada">
                    <input type="text" name="dia_marcado">
                    <input type="text" name="mes_marcado"> 
                    <input type="text" name="mes_num">
                </form>
            </section>
        </div>

        <?php include_once('./imports/import_footer.php'); ?>
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
        var mes_num;
        var ano;

        if (num >= dia_atual) {
            mes_marcado =
                    "<?php
        $mes_num = intval(date('m', strtotime($con_seleciona_agendamento['data'])));
        echo $mes[intval($mes_num)];
        ?>";
            mes_num = <?php echo $mes_num; ?>;
            document.form_horarios.mes_num.value = mes_num;
            ano = "<?php date('Y', strtotime($data_atual_servidor)); ?>";
        } else {
            mes_marcado =
                    "<?php
        $mes_num = intval(date('m', strtotime($con_seleciona_agendamento['data'])));
        echo $mes[intval((($mes_num + 1) == 13) ? 1 : $mes_num + 1)];
        ?>";
            mes_num = <?php echo (($mes_num + 1) == 13) ? 1 : $mes_num + 1; ?>;
            document.form_horarios.mes_num.value = mes_num;
            ano = "<?php echo intval(date('Y', strtotime($data_atual_servidor)) + 1); ?>";
        }
        if (num > 9) {
            document.form_horarios.dia_marcado.value = num;
        } else {
            document.form_horarios.dia_marcado.value = "0" + num;
        }
        document.form_horarios.mes_marcado.value = mes_marcado;
        document.getElementById("hour").focus();
        var data_comp = ano + "-" + mes_num + "-" + num;
        $.ajax({
            type: 'post',
            dataType: 'html',
            url: './php/ArmazenaDataComparativa.php',
            data: {
                data_comp: data_comp
            },
            success: function (msg) {

            }
        });
    }
</script>