<!DOCTYPE html>

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
            <?php include_once './layout/header.php'; ?>
            <div class="row">
                <div class="col-md-12">
                    <div id="content">
                        <center>
                            <div class="mg-top-50"></div>
                            <span class="fs fs-18">Acesso negado, você não tem permissão para acessar esta página!</span>
                            <div class="mg-top-20"></div>
                            <a href="home.php"><input type="button" class="button button-orange" value="Voltar"></a>
                        </center>
                    </div>
                </div>
            </div>
            <?php include_once './layout/footer.php'; ?>
        </div>
    </body>
    <?php
    header( 'refresh:4; url=home.php' );
    ?>
    <!--dcdcdcddcdc-->
</html>
<script type="text/javascript">
    

    
</script>
