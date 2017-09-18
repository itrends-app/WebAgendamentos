<?php
session_name('aluno');
session_start();

include_once('../php/conexao.php');
$response = null;
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
                <div class="title">Reagendamento de Tutoria</div>
                <?php
                if (isset($_SESSION['confirm'])) {
                    echo '<div class="alert alert-success" role="alert">
                    <button type="button" class="close" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <span class="alert-msg">Reagendamento realizado com sucesso!</span>
                    </div>';
                    unset($_SESSION['confirm']);
                } else if (isset($_SESSION['error'])) {
                    echo '<div class="alert alert-danger" role="alert">
                    <button type="button" class="close" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <span class="alert-msg">Erro ao tentar reagendar horário com o tutor!</span>
                    </div>';
                    unset($_SESSION['error']);
                }
                ?>

                <form id="form-confirm" name="form_confirm" method="post" action="./php/ConfirmarReagendamento.php" autocomplete="off">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Reagendado para: </label>
                                <?php echo "<br><span>" . $_SESSION['dia_marcado'] . " de " . $_SESSION['mes_marcado'] . " de " . $_SESSION['ano_marcado'] . " " . $_SESSION['hora_marcada'] . "<br><label>Disciplina:</label><br>" . utf8_encode($_SESSION['disciplina']) . " <br> <label>Tutor:</label><br>" . $_SESSION['monitor_selecionado2'] . "</span>"; ?> 
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Motivo:</label>
                                <textarea class="form-control" required="true" name="motivo"></textarea> 
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-footer">
                            <input type="submit" value="Confirmar" class="btn btn-success btn-mob" data-toggle="modal" data-target="#loading-modal">
                            <a href="editar_agendamento_aluno.php"><input type="button" value="Cancelar" class="btn btn-danger btn-mob"></a>
                        </div>
                    </div>
                </form>
            </section>

        </div>
        <?php include_once('./imports/import_footer.php'); ?>
    </body>
</html>
