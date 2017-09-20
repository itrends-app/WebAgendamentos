<!DOCTYPE html>
<?php
include_once './php/Sessao.php';
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

                <div class="alert ocultar" role="alert">
                    <button type="button" class="close" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <span class="alert-msg"></span>
                </div>

                <div class="panel panel-footer">
                    <form name="agenda" class="form-inline">
                        <div class="form-group">
                            <label>de:</label> 
                            <input type="date" id="data-ini" class="form-control" name="data_inicial">
                        </div>
                        <div class="form-group">
                            <label>para:</label>
                            <input type="date" id="data-fim" class="form-control" name="data_final">
                        </div>
                        <input type="button" class="btn btn-success btn-mob" value="Buscar" onclick="buscarAgendamentosTutor();">
                    </form>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Matrícula</th>
                                <th>Nome Completo</th>
                                <th>Data</th>
                                <th>Hora</th>
                            </tr>
                        </thead>
                        <tbody id="dados-agenda">

                        </tbody>
                    </table>
                </div>

            </section>
        </div>

        <?php include_once('./imports/import_footer.php'); ?>
        <script src="./functionsJS/agendamento.js"></script>
    </body>
</html>