<!DOCTYPE html>
<?php
include_once './php/valida_usuario.php';
?>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="UTF-8">
        <title>Sucesso</title>
        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="../css/menu.css">
        <link rel="stylesheet" href="../css/bootstrap.css">
        <link rel="stylesheet" href="../css/componentes.css">
        <link rel="stylesheet" href="css/aluno.css">
        <link rel="stylesheet" href="../css/menu-mobile.css" media="(max-width:760px)">
        <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script type="text/javascript" src="../js/jquery-1.11.1.min.js"></script>
        <script src='https://www.google.com/recaptcha/api.js?hl=pt-BR'></script>
    </head>
    <body>
        <div class="container">
            <?php
            include_once '../layout/header.php';
            include_once './btn-sair.php';
            ?>
            <div class="corpo">
                <div class="form-confirmacao">
                    <i class="fa fa-check fa-2x c-green"></i>
                    <span class="fs fs-18">Agendamento cancelado com sucesso!</span>
                </div>
            </div>
            <?php
            include_once '../layout/footer.php';
            ?>
        </div>
    </body>
</html>
