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
                <div class="title">Limite de Agendamentos Atingido</div>
                <center>
                    <div class="alert alert-danger">
                        Desculpe, o número de reagendamentos chegou ao limite. Por favor contate o administrador do sistema!
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-footer">
                            <a href="consagendamentos.php"><input type="button" class="btn btn-danger" value="Voltar"></a>
                        </div>
                    </div>
                </center>
            </section>
        </div>
    </body>
</html>
