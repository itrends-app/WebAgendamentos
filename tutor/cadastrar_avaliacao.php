<!DOCTYPE html>
<html>
    <?php include_once('./imports/import_head.php'); ?>
    <body>
        <?php
        include_once('./imports/import_header.php');
        include_once('./imports/import_menu.php');
        ?>
        <div class="container-fluid">
            <section class="main-content">
                <div class="title">Cadastrar Avaliação</div>

                <!--Início do formulario-->
                <form method="post" name="form_avaliacao">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label class="control-label">Nome da Disciplina/Curso:</label>
                                <input type="text" name="disciplina" class="form-control" value="<?php echo ''; ?>" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label class="control-label">Descrição da Avaliação</label>
                                <input type="text" name="avaliacao" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-5">
                            <label>Horário da Prova:</label>
                            <div class="panel panel-default panel-padding">
                                <div class="row">
                                    <div class="col-xs-2">
                                        <label></label>
                                        <input type="checkbox" name="seg" value="seg" class="mg-top-20">seg
                                    </div>
                                    <div class="col-xs-5">
                                        <label>de:</label>
                                        <input type="text" name="seg_ini" class="form-control form-hora">
                                    </div>
                                    <div class="col-xs-5">
                                        <label>até:</label>
                                        <input type="text" name="seg_fim" class="form-control form-hora">
                                    </div>

                                </div>
                                <div class="row mg-top-10">
                                    <div class="col-xs-2">
                                        <label></label>
                                        <input type="checkbox" name="ter" value="ter" class="mg-top-20">ter
                                    </div>
                                    <div class="col-xs-5">
                                        <label>de:</label>
                                        <input type="text" name="ter_ini" class="form-control">
                                    </div>
                                    <div class="col-xs-5">
                                        <label>até:</label>
                                        <input type="text" name="ter_fim" class="form-control">
                                    </div>
                                </div>
                                <div class="row mg-top-10">
                                    <div class="col-xs-2">
                                        <label></label>
                                        <input type="checkbox" name="qua" value="qua" class="mg-top-20">qua
                                    </div>
                                    <div class="col-xs-5">
                                        <label>de:</label>
                                        <input type="text" name="qua_ini" class="form-control">
                                    </div>
                                    <div class="col-xs-5">
                                        <label>até:</label>
                                        <input type="text" name="qua_fim" class="form-control">
                                    </div>
                                </div>
                                <div class="row mg-top-10">
                                    <div class="col-xs-2">
                                        <label></label>
                                        <input type="checkbox" name="qui" value="qui" class="mg-top-20">qui
                                    </div>
                                    <div class="col-xs-5">
                                        <label>de:</label>
                                        <input type="text" name="qui_ini" class="form-control">
                                    </div>
                                    <div class="col-xs-5">
                                        <label>até:</label>
                                        <input type="text" name="qui_fim" class="form-control">
                                    </div>
                                </div>
                                <div class="row mg-top-10">
                                    <div class="col-xs-2">
                                        <label></label>
                                        <input type="checkbox" name="sex" value="sex" class="mg-top-20">sex
                                    </div>
                                    <div class="col-xs-5">
                                        <label>de:</label>
                                        <input type="text" name="sex_ini" class="form-control">
                                    </div>
                                    <div class="col-xs-5">
                                        <label>até:</label>
                                        <input type="text" name="sex_fim" class="form-control">
                                    </div>
                                </div>
                                <div class="row mg-top-10">
                                    <div class="col-xs-2">
                                        <label></label>
                                        <input type="checkbox" name="sab" value="sab" class="mg-top-20">sab
                                    </div>
                                    <div class="col-xs-5">
                                        <label>de:</label>
                                        <input type="text" name="sab_ini" class="form-control">
                                    </div>
                                    <div class="col-xs-5">
                                        <label>até:</label>
                                        <input type="text" name="sab_fim" class="form-control">
                                    </div>
                                </div>
                                <div class="row mg-top-10">
                                    <div class="col-xs-2">
                                        <label></label>
                                        <input type="checkbox" name="dom" value="dom" class="mg-top-20">dom
                                    </div>
                                    <div class="col-xs-5">
                                        <label>de:</label>
                                        <input type="text" name="dom_ini" class="form-control">
                                    </div>
                                    <div class="col-xs-5">
                                        <label>até:</label>
                                        <input type="text" name="dom_fim" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-footer">
                            <button type="button" class="btn btn-success">Cadastrar</button>
                        </div>
                    </div>
                </form>
                <!--Fim do formulário-->
            </section>
        </div>
        <?php include_once('./imports/import_footer.php'); ?>
    </body>
</html>
