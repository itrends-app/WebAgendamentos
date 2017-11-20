<!DOCTYPE html>
<?php
include_once './php/SessaoUsuario.php';
if ($_SESSION['hora_marcada'] == "" || !isset($_SESSION['hora_marcada'])) {
    header("location:./editar_agendamento.php");
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?php include_once './layout/AplicationName.php';?></title>
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/menu.css">
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/componentes.css">
        <link rel="stylesheet" href="css/aluno.css">
        <link rel="stylesheet" href="css/menu-mobile.css" media="(max-width:760px)">
        <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
    </head>
    <body>
        <div class="container">
            <?php
            include_once './layout/header.php';
            ?>
            <div class="row">
                <div class="col-md-3 col-xs-12 col-sm-4 col-lg-2">
                    <?php include_once 'layout/menu.php'; ?>
                </div>

                <div class="col-md-9 col-xs-12 col-sm-8 col-lg-10">
                    <div id="content">
                        <div class="form-edit-monitor">
                            <div class="mensagem">
                                <span class="fs fs-16 c-white"></span>
                                <a href="#" onclick="fecharMsgErro();" style="float:right;"><i class="fa fa-close c-white"></i></a>
                            </div>

                            <span class="fs fs-20 c-black">Confirmar Reagendamento</span>
                            <div class="mg-top-10"></div>
                            <div class="ln-tracejada-1"></div>
                            <div class="mg-top-10"></div>
                            
                            <center>
                                <div id="loader" class="ocultar">
                                    <img src="images/ajax-loader.gif" alt="">
                                </div>
                            </center>
                            
                            <div class="mg-top-10"></div>
                            <span class="fs fs-16 c-gray-50">Reagendado para: <?php echo $_SESSION['dia_marcado'] . " de " . strtolower($_SESSION['mes_marcado']) . " de " . $_SESSION['ano_marcado'] . " " . $_SESSION['hora_marcada']; ?></span>

                            <div class="mg-top-20"></div>
                            <center>
                                <a href="editar_agendamento.php">
                                    <input type="button" id="btn-cancelar" value="Cancelar" class="button">
                                </a>
                                
                                <a href="consulta_agendamentos.php">
                                    <input type="button" id="btn-voltar" value="Voltar" class="button ocultar">
                                </a>

                                <input type="button" id="btn-confirmar" value="Confirmar" class="button button-orange" onclick="confirmar();">
                            </center>
                        </div>

                    </div>
                </div>
            </div>

            <?php
            include_once './layout/footer.php';
            ?>
        </div>
    </body>
</html>
<script type="text/javascript">
    function confirmar() {
        $('#loader').css('display', 'block');
        $.ajax({
            type: 'POST',
            dataType: 'html',
            url: './php/EditarAgendamento.php',
            success: function (dados) {
                var d = trim(dados);
                if (d === "ok") {
                    $('.mensagem span').html('Reagendamento realizado com sucesso!');
                    $('.mensagem').removeClass('bg-red-60');
                    $('.mensagem').css('background-color', '#32BF32').css('display', 'block');
                    $('.ocultar').css('display', 'none');
                    $('#btn-confirmar').css('display', 'none');
                    $('#btn-cancelar').css('display', 'none');
                    $('#btn-voltar').css('display', 'block');
                } else {
                    $('.mensagem span').html('Erro ao tentar reagendar encontro!');
                    $('.mensagem').addClass('bg-red-60');
                    $('.mensagem').css('display', 'block');
                    $('#loader').css('display', 'none');
                }
            }
        });
    }

    function fecharMsgErro() {
        $('.mensagem').css('display', 'none').css('transition', '1s');
    }

    function trim(str) {
        return str.replace(/^\s+|\s+$/g, "");
    }
</script>