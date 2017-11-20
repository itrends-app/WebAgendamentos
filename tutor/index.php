<!DOCTYPE html>
<?php
include_once './php/Sessao.php';
$pag = 'opt';
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
                <div class="title">Últimos Agendamentos</div>

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
                        <?php include_once('./php/BuscaUltimosAgendamentos.php'); ?>
                    </table>
                </div>
            </section>
        </div>
        <?php include_once('./imports/import_footer.php');?>
    </body>
</html>
