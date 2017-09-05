<?php
try {
    //busca as categorias pais globais
    $categoria = $pdo->prepare("select id_category, name from vw_categorias where parent = 0");
    $categoria->execute();
} catch (PDOException $ex) {
    echo $ex->getMessage();
}
?>
<div id="cad-monitor">
    <div class="panel panel-default">
        <div class="panel-footer">
            <form method="post" name="form_cat" id="form-categoria">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="sel-categoria" class="text-capitalize">categoria:</label>
                            <select name="categoria" id="sel-categoria" class="form-control" >
                                <option value="">Selecione uma</option>
                                <?php
                                while ($conn = $categoria->fetch(PDO::FETCH_ASSOC)) {
                                    $st = $pdo->prepare("select * from vw_categorias where parent = :pai order by name");
                                    $st->bindValue(":pai", $conn['id_category']);
                                    $st->execute();
                                    echo '<optgroup label="' . utf8_encode($conn['name']) . '">';
                                    while ($filha = $st->fetch(PDO::FETCH_ASSOC)) {
                                        ?>
                                        <option value="<?php echo $filha['id_category']; ?>"><?php echo utf8_encode($filha['name']); ?></option>
                                        <?php
                                    }
                                    echo '</optgroup>';
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="sel-curso" class="text-capitalize">curso:</label>
                        <br>
                        <select name="curso" id="sel-curso" class="form-control">
                            <option value="">Selecione um</option>
                        </select>
                    </div>

                </div>
            </form>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>Matrícula</th>
                    <th>Nome do Usuário</th>
                    <th>Cidade</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody id="tabela">
                
            </tbody>
        </table>
    </div>

    <center>
        <form method="post" action="" id="form-monitor" class="ocultar">
            <input type="text" name="monitor" id="id-monitor">
            <input type="text" name="curso" id="id-curso">
            <!--<input type="button" id="salvar-monitor" value="Salvar" class="button button-orange">-->
        </form>
    </center>
</div>