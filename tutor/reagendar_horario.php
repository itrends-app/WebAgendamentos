<!DOCTYPE html>
<?php
include_once './php/Sessao.php';
include_once './php/mes_por_extenso.php';
include_once './php/VetorDias.php';
include_once ('./php/Conexao.php');

$st = $pdo->prepare("select * from tb_horarios_monitor hm, vw_usuarios us, vw_cursos c, vw_categorias cat where hm.monitor_id = :monitor and us.id = hm.monitor_id and c.id_course = hm.curso_id and c.category = cat.id_category");
$st->bindValue(":monitor", $_SESSION['tutor_id']);
$st->execute();
$con = $st->fetch(PDO::FETCH_ASSOC);
$grade = $con['exibicao_grade'];
if (isset($_SESSION['agendamento_id'])) {
    $st2 = $pdo->prepare("select * from tb_agendamentos where id = :agendamento");
    $st2->bindValue(":agendamento", $_SESSION['agendamento_id']);
    $st2->execute();
    $con_seleciona_agendamento = $st2->fetch(PDO::FETCH_ASSOC);
}
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
                <div class="title">Reagendar Horário</div>

                <div class="alert ocultar" role="alert">
                    <button type="button" class="close" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <span class="alert-msg"></span>
                </div>

                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Dias Agendados</th>
                                <th>Qtd. Alunos</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <?php include_once './php/BuscaHorariosOcupados.php'; ?>
                    </table>
                </div>

                <div class="mg-top-20"></div>
                <div class="ln-tracejada-1"></div>
                <div class="mg-top-10"></div>
                <center>
                    <?php if (isset($_SESSION['agendamento_id'])) { ?>
                        <div id="novo-horario">
                            <div class="informacoes">
                                <span class="fs fs-16">Agendamento anterior: <b><?php echo date('d/m/Y', strtotime($_SESSION['data_agendada'])) . " " . $_SESSION['hora_agendada']; ?></b></span>
                            </div>
                            <br>

                            <div class="grade1">
                                <?php include_once './edita_grade_um.php'; ?>
                            </div>

                            <div class="horarios" id="hour">
                                <div class="horario1">
                                    <?php include_once('./edita_grade_horarios.php'); ?>
                                </div>
                            </div>
                        </div>
                    <?php } ?>


                </center>
                <form name="reagendar">
                    <span class="fs fs-16">Justificativa:<b class="c-red">*</b></span>
                    <div class="mg-top-5"></div>
                    <textarea class="inp inp-catolica" name="motivo"></textarea>
                </form>

                <div class="mg-top-10"></div>

                <center>
                    <input type="button" id="btn-confirmacao" class="button button-orange fs fs-16" value="Confirmar Reagendamento" onclick="confirmarEdicao();">
                    <input type="button" id="btn-atualizar" class="button button-orange fs fs-16 ocultar" value="Atualizar" onclick="atualizar();">
                </center>
            </section>
        </div>

        <form method="post" name="form_horarios" id="form-horario" action="" class="ocultar">
            <input type="text" name="hora_marcada">
            <input type="text" name="dia_marcado">
            <input type="text" name="mes_marcado"> 
            <input type="text" name="mes_num">
        </form>
        <?php include_once('./imports/import_footer.php'); ?>
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
            function selecionarHorario(data_agendada, hora_agendada, agendamento_id) {
                abreLoading();
                $.ajax({
                    type: 'post',
                    dataType: 'html',
                    url: './php/ArmazenaDados.php',
                    data: {
                        data: data_agendada,
                        hora: hora_agendada,
                        agendamento: agendamento_id
                    },
                    success: function (msg) {
                        if (msg === "ok") {
                            fechaLoading();
                            location.href = 'reagendar_horario.php';
                        } else {
                            $('.alert').addClass('alert-danger').fadeIn(500);
                            $('.alert .alert-msg').html("O tempo para reagendar o encontro de monitoria expirou!");
                            $('#novo-horario').html("");
                        }
                    }
                });
            }

            function fecharMsgErro() {
                $('.mensagem').css('display', 'none').css('transition', '1s');
            }
            function abreLoading() {
                $('#loading').css('display', 'block');
            }
            function fechaLoading() {
                $('#loading').css('display', 'none');
            }

            function pintar(dia, num, dia_atual, data_agendada) {
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
                    mes_marcado =
                            "<?php
        $mes_num = intval(date('m', strtotime($con_seleciona_agendamento['data'])));
        echo $mes[intval($mes_num)];
        ?>";
                    document.form_horarios.mes_num.value = "<?php echo $mes_num; ?>";
                } else {
                    mes_marcado = "<?php echo (intval(date('m', strtotime($dia))) == 12) ? 'Janeiro' : $mes[intval(date('m', strtotime($dia)) + 1)]; ?>";
                    document.form_horarios.mes_num.value = <?php echo (intval(date('m', strtotime($dia))) == 12) ? 01 : intval(date('m', strtotime($dia))) + 1; ?>;
                }
                document.form_horarios.dia_marcado.value = num;
                document.form_horarios.mes_marcado.value = mes_marcado;
                document.getElementById("hour").focus();
            }

            function confirmarEdicao() {
                abreLoading();
                var novoDia = this.form_horarios.dia_marcado.value;
                var novoMes = this.form_horarios.mes_marcado.value;
                var novoNumMes = this.form_horarios.mes_num.value;
                var novaHora = this.form_horarios.hora_marcada.value;
                var motivo = this.reagendar.motivo.value;
                if (motivo.length >= 20) {
                    $.ajax({
                        type: 'post',
                        dataType: 'html',
                        url: './php/ConfirmarEdicao.php',
                        data: {
                            dia: novoDia,
                            mes: novoMes,
                            num_mes: novoNumMes,
                            hora: novaHora,
                            motivo: motivo
                        },
                        success: function (msg) {
                            if (msg === "ok") {
                                fechaLoading();
                                $('#btn-confirmacao').addClass('ocultar');
                                $('#btn-atualizar').removeClass('ocultar');
                                $('#novo-horario').html("");
                                $('.mensagem span').html("Reagendamento realizado com sucesso!!");
                                $('.mensagem').css('display', 'block').css('background-color', '#32BF32').removeClass('bg-red-60');
                            } else {
                                fechaLoading();
                                $('.mensagem span').html("Erro ao tentar confirmar o reagendamento!");
                                $('.mensagem').css('display', 'block').addClass('bg-red-60');
                            }
                        }
                    });
                } else {
                    fechaLoading();
                    $('.mensagem span').html("Por favor, digite um motivo válido para o concluir o reagendamento! (O motivo deve conter no mínimo 20 caracteres)");
                    $('.mensagem').css('display', 'block').addClass('bg-red-60');
                }
            }

            function atualizar() {
                location.href = 'reagendar_horario.php';
            }

        </script>

    </body>
</html>
