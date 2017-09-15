<!DOCTYPE html>
<?php
include_once './php/SessaoUsuario.php';
include_once('./php/conexao.php');
$pag = "cad";
?>
<html>
    <?php include_once('./imports/import_head.php'); ?>
    <body>
        <?php
        include_once('./imports/import_header.php');
        include_once('./imports/import_menu.php');
        ?>
        <div class="container-fluid">

            <!--MODAL DE CONFIRMAÇÃO DE EXCLUSÃO-->
            <div class="modal fade" id="delete-modal" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-sm" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title"><strong>Excluir Usuário</strong></h4>
                        </div>
                        <div class="modal-body">
                            <p class="h5"><strong>Deseja realmente excluir o tutor?</strong></p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-success" onclick="excluirHorario();" data-dismiss="modal">Sim</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Não</button>
                        </div>
                    </div>
                </div>
            </div>
            <!--FIM DO MODAL-->

            <section class="main-content">
                <div class="alert ocultar" role="alert">
                    <button type="button" class="close" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <span class="alert-msg text-uppercase">O tutor selecionado já foi cadastrado!</span>
                </div>
                <div class="title">Cadastro de Tutor</div>
                <ul class="abas">
                    <li class="active"><a href="#" title="tutor" onclick="mudaAba(this);"><i class="fa fa-user"></i> Tutor</a></li>
                    <li><a href="#" title="horario" onclick="mudaAba(this);"><i class="fa fa-clock-o"></i> Horário</a></li>
                    <li><a href="#" title="avancado" onclick="mudaAba(this);"><i class="fa fa-bell"></i> Avançado</a></li>
                    <li><a href="#" title="confirm" onclick="mudaAba(this);"><i class="fa fa-calendar"></i> Confirmação</a></li>
                </ul>
                <form method="post" action="" name="form_cad_horario">
                    <?php include_once './aba_monitor.php'; ?>
                    <?php include_once './aba_horario.php'; ?>
                    <br>
                    <?php include_once './aba_avancado.php'; ?>
                    <?php include_once './aba_agendado_para.php'; ?>
                </form>
            </section>
        </div>
        <?php
        include_once('./imports/import_footer.php');
        ?>
        <script src="./functionsJS/tutor.js"></script>
        <script type="text/javascript" src="js/valida_hora.js"></script>
        <script>
                        $('.form-mask').mask('99:99');
        </script>
    </body>

</html>

