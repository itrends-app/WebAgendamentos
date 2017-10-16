<!DOCTYPE html>
<?php
include_once './php/valida_usuario.php';
$pag = "opt";
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
                <div class="title">Consultar Agendamentos</div>
                <form name="form" class="form-inline">
                    <div class="form-group">
                        <label>Data Inicial:</label>
                        <input type="date" id="dt_ini" class="form-control" name="dataI">
                    </div>
                    <div class="form-group">
                        <label>Data Final:</label>
                        <input type="date" id="dt_fim" class="form-control" name="dataF">
                    </div>
                    <input type="button" class="btn btn-success btn-mob" value="Buscar" onclick="buscar();">
                </form>

                <div class="mg-top-20"></div>

                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th class="text-center text-uppercase">Nome do Tutor</th>
                                <th class="text-center text-uppercase">Curso</th>
                                <th class="text-center text-uppercase">Agendamento</th>
                                <th class="text-center text-uppercase">Ações</th>
                            </tr>
                        </thead>
                        <tbody id="dados-agenda"></tbody>
                    </table>
                </div>
            </section>
        </div>
        <?php
        include_once('./imports/import_footer.php');
        ?>
        <script type="text/javascript">
            $(function () {
                $('[data-toggle="tooltip"]').tooltip();
            });

            $('#dt_ini').mask('99/99/9999');
            $('#dt_fim').mask('99/99/9999');

            function buscar() {
                $('#dados-agenda').empty();
                var data_inicial = this.form.dataI.value;
                var data_final = this.form.dataF.value;
                $.ajax({
                    type: 'POST',
                    dataType: 'json',
                    url: './php/ConsultaAgendamentos.php',
                    data: {
                        data_ini: data_inicial,
                        data_fim: data_final
                    },
                    success: function (dados) {
                        if (dados === "not") {
                            $('#dados-agenda').append("<tr><td colspan='4'>Nenhum agendamento encontrado!</td></tr>");
                        } else {
                            for (var i = 0; i < dados.length; i++) {
                                $('#dados-agenda').append('<tr><td>' + dados[i].firstname + '</td><td>' + dados[i].fullname + '</td><td>' + dados[i].horario + '</td>\n\
                                <td class="text-center"><a data-toggle="tooltip" data-placement="bottom" title="Reagendar horário" href="./php/pega_dados_via_email.php?id=' + dados[i].id + '&email=<?php echo $_SESSION['email_aluno']; ?>&edt=' + dados[i].monitor_id + '"><i class="material-icons md-dark">settings</i></a> \n\
                                <a href="./php/pega_dados_via_email.php?id=' + dados[i].id + '&email=<?php echo $_SESSION['email_aluno']; ?>"><i class="material-icons md-dark-red">delete_forever</i></a></td></tr>');
                            }
                        }
                        footer();
                    }
                });
            }

        </script>
    </body>

</html>
