<!DOCTYPE html>
<?php
include_once('./php/valida_usuario.php');
$pag = "rel";
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
                <div class="title">Relatório de Agendamentos</div>
                <div class="panel panel-default" style="padding: 20px;">
                    <form method="post" target="_blank" action="./relatorio/rel_agendamentos.php">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Data Inicial:</label>
                                    <input type="date" name="dt_inicial" class="form-control"> 
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Data Final:</label>
                                    <input type="date" name="dt_final" class="form-control"> 
                                </div>
                            </div>
                        </div>

                        <div class="panel panel-default">
                            <div class="panel-footer">
                                <input type="submit" class="btn btn-success btn-mob" value="Gerar Relatório">
                            </div>
                        </div>
                    </form>
                </div>
            </section>
        </div>
        <?php include_once('./imports/import_footer.php'); ?>
    </body>
</html>
