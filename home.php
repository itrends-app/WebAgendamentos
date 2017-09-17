<!DOCTYPE html>
<?php
include_once './php/SessaoUsuario.php';
include_once('./php/conexao.php');
include_once './php/mes_por_extenso.php';
include_once './php/QtdeAgendamentosPorMes.php';
$pag = "home";
$mes_atual = intval(date('m'));
?>
<html lang="pt">
    <head>
        <link href="./dashboard/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="./dashboard/css/sb-admin.css" rel="stylesheet">
        <link href="./dashboard/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
    </head>
    <?php include_once('./imports/import_head.php'); ?>
    <body>
        <?php
        include_once('./imports/import_header.php');
        include_once('./imports/import_menu.php');
        ?>
        <div class="container-fluid">
            <section class="main-content">
                <form method="post" class="ocultar">
                    <input type="text" id="val1" value="<?php echo $jan; ?>">
                    <input type="text" id="val2" value="<?php echo $fev; ?>">
                    <input type="text" id="val3" value="<?php echo $marco; ?>">
                    <input type="text" id="val4" value="<?php echo $abril; ?>">
                    <input type="text" id="val5" value="<?php echo $maio; ?>">
                    <input type="text" id="val6" value="<?php echo $junho; ?>">
                    
                    <input type="text" id="val7" value="<?php echo $julho; ?>">
                    <input type="text" id="val8" value="<?php echo $agosto; ?>">
                    <input type="text" id="val9" value="<?php echo $setembro; ?>">
                    <input type="text" id="val10" value="<?php echo $outubro; ?>">
                    <input type="text" id="val11" value="<?php echo $novembro; ?>">
                    <input type="text" id="val12" value="<?php echo $dezembro; ?>">
                </form>
                <div class="card mb-3">
                    <div class="card-header">
                        <i class="fa fa-area-chart"></i>
                        Quantidade de Agendamentos por Mês
                    </div>
                    <div class="card-body">
                        <canvas id="myAreaChart" width="100%" height="30"></canvas>
                    </div>
                    <div class="card-footer small text-muted">
                        Atualizado hoje : <?php echo date('H:i');?>
                    </div>
                </div>
                <!--<div id="columnchart_values" class="grafico-home"></div>-->
            </section>
        </div>
        <?php include_once('./imports/import_footer.php'); ?>
        <script src="./dashboard/vendor/jquery/jquery.min.js"></script>
        <script src="./dashboard/vendor/popper/popper.min.js"></script>
        <script src="./dashboard/vendor/bootstrap/js/bootstrap.min.js"></script>
        <script src="./dashboard/vendor/jquery-easing/jquery.easing.min.js"></script>
        <script src="./dashboard/vendor/chart.js/Chart.min.js"></script>
        <script src="./dashboard/vendor/datatables/jquery.dataTables.js"></script>
        <script src="./dashboard/vendor/datatables/dataTables.bootstrap4.js"></script>

        <!-- Custom scripts for this template -->
        <script src="./dashboard/js/sb-admin.js"></script>
    </body>
</html>
