<!DOCTYPE html>
<?php
include_once './php/SessaoUsuario.php';
include_once('./php/conexao.php');
$pag = "tutor";
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
<!--                <div id="abas">
                    <div class="group">
                        <div class="aba-guia guia1"><a href="#" onclick="selecionaAba('.guia1 a');"><i class="fa fa-user"></i> Tutor</a></div>
                        <div class="aba-guia guia2"><a href="#" onclick="selecionaAba('.guia2 a');"><i class="fa fa-clock-o"></i> Horário</a></div>
                    </div>
                    <div class="group">
                        <div class="aba-guia guia3"><a href="#" onclick="selecionaAba('.guia3 a');"><i class="fa fa-bell"></i> Avançado</a></div>
                        <div class="aba-guia guia4"><a href="#" onclick="selecionaAba('.guia4 a');"><i class="fa fa-calendar"></i> Agendado</a></div>
                    </div>
                </div>-->

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
    </body>

</html>

