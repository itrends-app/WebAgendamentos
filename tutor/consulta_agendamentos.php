<!DOCTYPE html>
<?php
include_once './php/Sessao.php';
?>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="UTF-8">
        <title>Agendamentos</title>
        <meta name="viewport" content="width=480px">
        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="../css/menu.css">
        <link rel="stylesheet" href="../css/bootstrap.css">
        <link rel="stylesheet" href="../css/componentes.css">
        <link rel="stylesheet" href="tutor.css">
        <link rel="stylesheet" href="../css/menu-mobile.css" media="(max-width:760px)">
        <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script type="text/javascript" src="../js/jquery-1.11.1.min.js"></script>
        <script type="text/javascript" src="../js/jquery.mask.js"></script>
    </head>
    <body>
        <div class="container">

            <div id="loading">
                <div class="img-loading">
                    <img src="images/ajax-loader.gif" width="60" height="60"> 
                </div>
            </div>

            <?php 
            include_once '../layout/header.php'; 
            include_once './btn_sair.php';
            ?>
            <div class="row">
                <div class="col-md-3 col-xs-12 col-sm-4 col-lg-2">
                    <?php include_once './layout/menu.php'; ?>
                </div>

                <div class="col-md-9 col-xs-12 col-sm-8 col-lg-10">
                    <div id="content">
                        <div class="form-edit-monitor">
                            <!--Mensagem de retorno-->
                            <div class="mensagem">
                                <a href="#" onclick="fecharMsgErro();" style="float:right;"><i class="fa fa-close c-white"></i></a>
                                <span class="fs fs-16 c-white"></span>
                            </div>

                            <span class="fs fs-20">Agendamentos</span>
                            <div class="mg-top-10"></div>
                            <div class="ln-tracejada-1"></div>
                            <div class="mg-top-10"></div>

                            <div class="bloco">
                                <form name="agenda">
                                    <div class="bloco">de: <input type="date" id="data-ini" class="inp inp-catolica hgt-35" name="data_inicial"> </div>
                                    <div class="bloco">para: <input type="date" id="data-fim" class="inp inp-catolica hgt-35" name="data_final"> </div>
                                    <input type="button" class="button button-orange" value="Buscar" onclick="buscar();">
                                </form>
                            </div>    
                            <!--<div class="mg-top-10"></div>-->
                            <div class="tb scroll-vertical">
                                <table>
                                    <tr>
                                        <th>Matrícula</th>
                                        <th>Nome Completo</th>
                                        <th>Data</th>
                                        <th>Hora</th>
                                    </tr>
                                    <tbody id="dados-agenda">

                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div> 

            <?php include_once '../layout/footer.php'; ?>
        </div>

    </body>
</html>
<script type="text/javascript">
    function buscar() {
        var data_ini = this.agenda.data_inicial.value;
        var data_fim = this.agenda.data_final.value;
        if (data_ini === "" || data_fim === "") {
            $('.mensagem span').html("Por favor, preencha a data inicial e a data final!");
            $('.mensagem').css('display', 'block').addClass('bg-red-60');
        } else {
            abreLoading();
            $('.mensagem').css('display', 'none');
            $('#dados-agenda').empty();
            $.ajax({
                type: 'post',
                dataType: 'json',
                url: './php/BuscarAgendamentos.php',
                data: {
                    data_inicial: data_ini,
                    data_final: data_fim
                },
                success: function (dados) {
                    window.setTimeout('fechaLoading()', 3000);
                    if (dados === null) {
                        $('#dados-agenda').append('<tr><td colspan="4">Nenhum agendamento encontrado!</td></tr>');
                    }
                    for (var i = 0; i < dados.length; i++) {
                        $('#dados-agenda').append('<tr><td>' + dados[i].username + '</td><td>' + dados[i].firstname + '</td>\n\
                        <td>' + formataData(dados[i].data) + '</td><td>' + dados[i].hora + '</td></tr>');
                    }
                }
            });
        }
    }

    function formataData(data) {
        var dia = data.substring(8, 10);
        var mes = data.substring(5, 7);
        var ano = data.substring(0, 4);
        return dia + "/" + mes + "/" + ano;
    }

    function fecharMsgErro() {
        $('.mensagem').css('display', 'none').css('transition', '1s');
    }

    function sleep(milliseconds) {
        var start = new Date().getTime();
        for (var i = 0; i < 1e7; i++) {
            if ((new Date().getTime() - start) >= milliseconds) {
                break;
            }
        }
    }
    function abreLoading() {
        $('#loading').css('display', 'block');
    }
    function fechaLoading() {
        $('#loading').css('display', 'none');
    }
</script>
