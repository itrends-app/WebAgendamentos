<!DOCTYPE html>
<?php
include_once './php/SessaoUsuario.php';
try {
    include_once './php/conexao.php';
    $st = $pdo->prepare("select id_category, name from vw_categorias where parent = 0");
    $st->execute();
} catch (Exception $ex) {
    echo $ex->getMessage();
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php include_once './layout/AplicationName.php'; ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./css/style.css">
        <link rel="stylesheet" href="./css/menu.css">
        <link rel="stylesheet" href="./css/bootstrap.css">
        <link rel="stylesheet" href="./css/componentes.css">
        <link rel="stylesheet" href="./css/aluno.css">
        <link rel="stylesheet" href="./css/menu-mobile.css" media="(max-width:760px)">
        <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script type="text/javascript" src="./js/jquery-1.11.1.min.js"></script>
        <script type="text/javascript" src="./js/jquery.mask.js"></script>
    </head>
    <body>
        <div class="container">
            <?php include_once './layout/header.php'; ?>
            <div class="row">
                <div class="col-md-3 col-xs-12 col-sm-4 col-lg-2">
                    <?php include_once './layout/menu.php'; ?>
                </div>
                <div class="col-md-9 col-xs-12 col-sm-8 col-lg-10">
                    <div id="content">
                        <div class="form-edit-monitor">
                            <span class="fs fs-20">Relatório de Agendamentos</span>
                            <div class="mg-top-10"></div>
                            <div class="ln-tracejada-1"></div>
                            <div class="mg-top-10"></div>

                            <form method="post" style="width: 300px;margin:10px auto;" target="_blank" action="./relatorios/RelAgendamentos.php">
                                <span class="fs fs-16">Data Inicial:</span>
                                <div class="mg-top-5"></div>
                                <input type="date" name="dt_inicial" class="inp inp-catolica wdt-300 hgt-35"> 

                                <div class="mg-top-10"></div>

                                <span class="fs fs-16">Data Final:</span>
                                <div class="mg-top-5"></div>
                                <input type="date" name="dt_final" class="inp inp-catolica wdt-300 hgt-35"> 
                                <div class="mg-top-10"></div>

                                <span class="fs fs-16">Categoria: </span><br>
                                <select name="categoria" class="wdt-300" onchange="escolheCurso(this.value);">
                                    <option value="">Selecione um</option>
                                    <?php
                                    while ($conn_cat = $st->fetch(PDO::FETCH_ASSOC)) {
                                        $st2 = $pdo->prepare("select * from vw_categorias where parent = :pai order by name");
                                        $st2->bindValue(":pai", $conn_cat['id_category']);
                                        $st2->execute();
                                        echo '<optgroup label="' . utf8_encode($conn_cat['name']) . '">';
                                        while($filha = $st2->fetch(PDO::FETCH_ASSOC)) {
                                            echo '<option value="' . $filha['id_category'] . '">' . utf8_encode($filha['name']) . '</option>';
                                        }
                                        echo '</optgroup>';
                                    }
                                    ?>
                                </select>

                                <div class="mg-top-10"></div>

                                <span class="fs fs-16">Curso: </span><br>
                                <select name="curso" id="sel-curso" class="wdt-300">
                                    <option value="">Selecione um</option>
                                </select>

                                <div class="mg-top-20"></div>
                                <center>
                                    <input type="submit" class="button button-orange hgt-40" value="Gerar Relatório">
                                </center>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
            <?php include_once './layout/footer.php'; ?>
        </div>
    </body>
</html>
<script type="text/javascript">
    function escolheCurso(categoria) {
        $("#sel-curso").empty();
        $.ajax({
            type: 'post',
            dataType: 'html',
            url: './php/select_cursos.php',
            data: {
                cat: categoria
            },
            success: function (dados) {
                $("#sel-curso").append('<option value="">Selecione um</option>'+dados);
            }
        });
    }
</script>
