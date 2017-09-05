<!DOCTYPE html>
<?php
include_once './php/Sessao.php';
?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Tutor NEAD</title>
        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="../css/menu.css">
        <link rel="stylesheet" href="../css/bootstrap.css">
        <link rel="stylesheet" href="../css/componentes.css">
        <!--<link rel="stylesheet" href="../css/aluno.css">-->
        <link rel="stylesheet" href="tutor.css">
        <link rel="stylesheet" href="../css/menu-mobile.css" media="(max-width:760px)">
        <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script type="text/javascript" src="../js/jquery-1.11.1.min.js"></script>
    </head>
    <body>
        <div class="container">
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
                            <span class="fs fs-20">Últimos Agendamentos</span>
                            <div class="mg-top-10"></div>
                            <div class="ln-tracejada-1"></div>
                            <div class="mg-top-10"></div>
                            
                            <div class="tb scroll-vertical">
                                <table>
                                    <tr>
                                        <th>Matrícula</th>
                                        <th>Nome Completo</th>
                                        <th>Data</th>
                                        <th>Hora</th>
                                    </tr>
                                    <?php include_once('./php/BuscaUltimosAgendamentos.php'); ?>
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
