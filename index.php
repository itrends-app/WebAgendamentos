<!DOCTYPE html>

<html>
    <?php include_once('./imports/import_head.php'); ?>
    <style> 
        .btn-active-menu {
            display:none;
        }
        .sidebar
    </style>
    <body>
        <?php include_once('./imports/import_header.php'); ?>
        <div class="container-fluid">
            <div class="login-content">
                <!--mensagem de alerta-->
                <div class="alert alert-danger alert-dismissible ocultar" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <span>Usuário ou senha incorretos!</span>
                </div>
                <!--formulario de login-->
                <form id="form-login" autocomplete="off">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="form-user" class="text-capitalize">usuário</label>
                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon1"><i class="glyphicon glyphicon-user"></i></span>
                                    <input type="text" name="user" id="form-user" class="form-control" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="form-senha" class="text-capitalize">senha:</label>
                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon1"><i class="glyphicon glyphicon-lock"></i></span>
                                    <input type="password" name="senha" id="form-senha" class="form-control" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <input type="button" value="Entrar" class="btn btn-success btn-mob" onclick="logar();">
                </form>
            </div>
        </div>
        <?php include_once('./imports/import_footer.php'); ?>
        <script src="./functionsJS/usuario.js"></script>
    </body>
</html>
