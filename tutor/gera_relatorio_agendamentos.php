<!DOCTYPE html>
<?php
include_once './php/Sessao.php';
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

                <form method="post" target="_blank" action="./relatorios/RelAgendamentos.php">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Data Inicial:</label>
                                <input type="date" name="dt_inicial" class="form-control"> 
                            </div>
                        </div>
                    </div>
                    <div  class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Data Final:</label>
                                <input type="date" name="dt_final" class="form-control"> 
                            </div>
                        </div>
                    </div>

                    <input type="submit" class="btn btn-success" value="Gerar Relatório">
                </form>
            </section>
        </div>
        <?php include_once('./imports/import_footer.php'); ?>
    </body>
</html>
