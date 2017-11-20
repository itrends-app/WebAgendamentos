<!DOCTYPE html>
<?php
include_once './php/valida_usuario.php';
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
                <div class="title">Cancelar Agendamento</div>
                <div class="alert alert-success">
                    <span class="alert-msg">Agendamento cancelado com sucesso!</span>
                </div>
                <div class="panel panel-default">
                    <div class="panel-footer">
                        <button class="btn btn-success center-block" onclick="location = 'consagendamentos.php'">Voltar</button>
                    </div>
                </div>
            </section>
        </div>
        <?php include_once('./imports/import_footer.php');?>
    </body>
</html>
