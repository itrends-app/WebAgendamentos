<!DOCTYPE html>

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
    </head>
    <body>
        <div class="container">
            <?php
            include_once '../layout/header.php';
            include_once './btn-sair.php';
            ?>
            <div class="corpo">
                <div class="form-confirmacao">
                    <span class="fs fs-20 c-black">Reagendamento</span>
                    <div class="mg-top-10"></div>
                    <div class="ln-tracejada-1"></div>
                    <div class="mg-top-10"></div>
                    <i class='fa fa-close fa-2x c-red'></i> Desculpe, o número de reagendamentos chegou ao limite. Por favor contate o administrador do sistema!
                </div>
            </div>
            <?php include_once '../layout/footer.php';?>
        </div>
    </body>
</html>
