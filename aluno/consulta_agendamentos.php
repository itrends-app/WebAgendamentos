<!DOCTYPE html>
<?php 
include_once './php/valida_usuario.php';
?>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="UTF-8">
        <title><?php include_once '../layout/AplicationName.php'; ?></title>
        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="../css/menu.css">
        <link rel="stylesheet" href="../css/bootstrap.css">
        <link rel="stylesheet" href="../css/componentes.css">
        <link rel="stylesheet" href="css/aluno.css">
        <link rel="stylesheet" href="../css/menu-mobile.css" media="(max-width:760px)">
        <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script type="text/javascript" src="../js/jquery-1.11.1.min.js"></script>
        <script type="text/javascript" src="../js/jquery.mask.js"></script>
    </head>
    <body>
        <div class="container">
            <?php
            include_once '../layout/header.php';
            include_once './btn-sair.php';
            include_once './layout/menu.php';
            ?>
            <div class="corpo">
                <div class="form-confirmacao">
                    <!--mensagem-->
                    <div class="mensagem">
                        <span class="fs fs-16 c-white">teste</span>
                        <a href="#" onclick="fecharMsgErro();" style="float:right;"><i class="fa fa-close c-white"></i></a>
                    </div>

                    <span class="fs fs-20">Consultar Agendamentos</span>
                    <div class="mg-top-10"></div>
                    <div class="ln-tracejada-1"></div>
                    <div class="mg-top-10"></div>

                    <form name="form">
                        <div class="bloco">
                            <span class="fs fs-16">Data Inicial:</span>
                            <input type="date" id="dt_ini" class="inp inp-catolica hgt-35" name="dataI">
                        </div>
                        <div class="bloco">
                            <span class="fs fs-16">Data Final:</span>
                            <input type="date" id="dt_fim" class="inp inp-catolica hgt-35" name="dataF">
                        </div>
                        <div class="bloco">
                            <input type="button" class="button button-orange" value="Buscar" onclick="buscar();">
                        </div>    
                    </form>

                    <div class="mg-top-10"></div>

                    <div class="tb scroll-vertical">
                        <table>
                            <tr>
                                <th>Monitor</th>
                                <th>Curso</th>
                                <th>Agendamento</th>
                                <th>Ações</th>
                            </tr>
                            <tbody id="dados-agenda"></tbody>
                        </table>
                    </div>
                </div>
            </div>

            <?php
            include_once '../layout/footer.php';
            ?>
        </div>
    </body>
    <script type="text/javascript">
        $('#dt_ini').mask('99/99/9999');
        $('#dt_fim').mask('99/99/9999');

        function buscar() {
            $('#dados-agenda').empty();
            var data_inicial = this.form.dataI.value;
            var data_final = this.form.dataF.value;
            $.ajax({
                type: 'POST',
                dataType: 'json',
                url: './php/ConsultaAgendamentos.php',
                data: {
                    data_ini: data_inicial,
                    data_fim: data_final
                },
                success: function (dados) {
                    if (dados === "not") {
                        $('#dados-agenda').append("<tr><td colspan='4'>Nenhum agendamento encontrado!</td></tr>");
                    } else {
                        for (var i = 0; i < dados.length; i++) {
                            $('#dados-agenda').append('<tr><td>' + dados[i].firstname + '</td><td>'+dados[i].fullname+'</td><td>'+dados[i].horario+'</td>\n\
                                <td><a href="./php/pega_dados_via_email.php?id='+dados[i].id+'&email=<?php echo $_SESSION['email_aluno'];?>&edt='+dados[i].monitor_id+'"><i class="fa fa-cog c-black"></i></a> \n\
                                <a href="./php/pega_dados_via_email.php?id='+dados[i].id+'&email=<?php echo $_SESSION['email_aluno'];?>"><i class="fa fa-trash c-red"></i></a></td></tr>');
                        }
                    }
                }
            });
        }

        function fecharMsgErro() {
            $('.mensagem').css('display', 'none').css('transition', '1s');
        }
    </script>
</html>
