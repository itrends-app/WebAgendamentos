<!DOCTYPE html>
<?php
include_once './php/SessaoUsuario.php';
?>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="UTF-8">
        <title><?php include_once './layout/AplicationName.php';?></title>
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/menu.css">
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/componentes.css">
        <link rel="stylesheet" href="css/menu-mobile.css" media="(max-width:760px)">
        <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
        
    </head>
    <body>
        <div class="container">
            <?php
            include_once './layout/header.php';
            ?>
            <div id="content">
                <center>
                    <div class="sair">
                        <span class="fs fs-16">Deseja realmente sair do sistema?</span>
                        <div class="mg-top-10"></div>
                        <a href="./php/EncerrarSessao.php"><input type="button" value="Sim" class="button button-orange"></a>
                        <a href="home.php"><input type="button" value="Não" class="button button-orange"></a>
                    </div>
                </center>
            </div>
            <?php
            include_once './layout/footer.php';
            ?>
        </div>
    </body>
</html>
