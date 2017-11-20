<?php
include_once('./php/valida_usuario.php');
require_once '../recaptchalib.php';
include_once('../php/conexao.php');
$pag = "opt";
?>
<!DOCTYPE html>
<html>
    <?php include_once('./imports/import_head.php'); ?>
    <body>
        <?php
        include_once('./imports/import_header.php');
        include_once('./imports/import_menu.php');
        ?>
        <div class="container-fluid">

            <!--MODAL DE CONFIRMAÇÃO DE EXCLUSÃO-->
            <div class="modal fade" id="loading-modal" tabindex="-1" data-backdrop="static" role="dialog">
                <div class="modal-dialog modal-sm" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <!--<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>-->
                            <h4 class="modal-title"><strong>Aguarde... </strong></h4>
                        </div>
                        <div class="modal-body">
                            <p class="h5"><center><img src="./images/ajax-loader.gif" alt="loading"></center></p>
                        </div>
                    </div>
                </div>
            </div>
            <!--FIM DO MODAL-->

            <section class="main-content">
                <!--MENSAGEM DE CONFIRMAÇÃO-->
                <?php
                if (isset($_SESSION['confirm'])) {
                ?>
                    <div class="alert alert-success" role="alert">
                        <button type="button" class="close" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        Agendamento confirmado com sucesso!
                    </div>
                <?php
                }
                ?>
                <!--FIM DA MENSAGEM-->
                <div class="title">Confirmar Agendamento</div>
                <form id="form-confirm" name="form_confirm" method="post" action="./php/SalvaAgendamento.php" autocomplete="off">
                    <div class="row">
                        <div class="col-sm-6">
                            <p class="h4">Agendado para:</p>
                            <div class="mg-top-10"></div>
                            <?php echo "<span>" . $_SESSION['dia_marcado'] . " de " . $_SESSION['mes_marcado'] . " de " . $_SESSION['ano_marcado'] . " " . $_SESSION['hora_marcada'] . " até " . date('H:i', strtotime($_SESSION['hora_marcada'] . ' + ' . $_SESSION['grade2'] . ' minutes')) . "<br>Curso: " . utf8_encode($_SESSION['disciplina']) . " <br>Tutor: " . utf8_encode($_SESSION['monitor_selecionado2']) . "</span>"; ?> 
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <p class="h4">Confirmar email: </p>
                            <div class="mg-top-10"></div>
                            <input type="text" name="email" class="form-control" required="true">
                        </div>
                    </div>
                    <br>
                    <div class="panel panel-default">
                        <div class="panel-footer">
                            <input type="submit" value="Confirmar" class="btn btn-success btn-mob" data-toggle="modal" data-target="#loading-modal" <?php echo (isset($_SESSION['confirm'])) ? 'disabled' : ''; ?>>
                            <a href="horarios.php"><input type="button" value="<?php echo (isset($_SESSION['confirm'])) ? 'Voltar' : 'Cancelar'; ?>" class="btn btn-danger btn-mob"></a>
                        </div>
                    </div>
                </form>
            </section>
        </div>

        <?php include_once('./imports/import_footer.php'); ?>
        <script src='https://www.google.com/recaptcha/api.js?hl=pt-BR'></script>
    </body>
</html>
