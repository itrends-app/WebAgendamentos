<!DOCTYPE html>
<?php
include_once('./php/SessaoUsuario.php');
try {
    include_once('./php/conexao.php');
    $st = $pdo->prepare("select id_category, name from vw_categorias where parent = 0");
    $st->execute();
} catch (Exception $ex) {
    echo $ex->getMessage();
}
?>
<html>
    <?php include_once('./imports/import_head.php'); ?>
    <body>
        <?php
        include_once('./imports/import_header.php');
        include_once('./imports/import_menu.php');
        ?>
        <div class="container-fluid">
            <section class="main-content">
                <div class="title">Relatório de Agendamentos</div>

                <form method="post" target="_blank" action="./relatorios/RelAgendamentos.php">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Data Inicial:</label>
                                <input type="date" name="dt_inicial" class="form-control"> 
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Data Final:</label>
                                <input type="date" name="dt_final" class="form-control"> 
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Categoria: </label>
                                <select name="categoria" class="form-control" onchange="escolheCurso(this.value);">
                                    <option value="">Selecione um</option>
                                    <?php
                                    while ($conn_cat = $st->fetch(PDO::FETCH_ASSOC)) {
                                        $st2 = $pdo->prepare("select * from vw_categorias where parent = :pai order by name");
                                        $st2->bindValue(":pai", $conn_cat['id_category']);
                                        $st2->execute();
                                        echo '<optgroup label="' . utf8_encode($conn_cat['name']) . '">';
                                        while ($filha = $st2->fetch(PDO::FETCH_ASSOC)) {
                                            echo '<option value="' . $filha['id_category'] . '">' . utf8_encode($filha['name']) . '</option>';
                                        }
                                        echo '</optgroup>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Curso: </label>
                                <select name="curso" id="sel-curso" class="form-control">
                                    <option value="">Selecione um</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="panel panel-default">
                        <div class="panel-footer">
                            <input type="submit" class="btn btn-success" value="Gerar Relatório">
                        </div>
                    </div>
                </form>

            </section>
        </div>
        <?php include_once('./imports/import_footer.php'); ?>
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
                $("#sel-curso").append('<option value="">Selecione um</option>' + dados);
            }
        });
    }
</script>
