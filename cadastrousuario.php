<!DOCTYPE html>
<?php
include_once './php/SessaoUsuario.php';
if ($_SESSION['nivel_acesso'] == 2) {
    header("Location:403.php");
}
$pag = "cad";
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
                <div class="alert ocultar" role="alert">
                    <button type="button" class="close" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <span class="alert-msg"></span>
                </div>
                <div class="title">Cadastro de Usuários</div>
                <form method="post" id="form-usuario" name="form_usuario">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="form-nome-usuario">Nome do Usuário:</label>
                                <input type="text" name="nome_usuario" id="form-nome-usuario" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="form-usuario" class="fs fs-16">Usuário:</label>
                                <input type="text" name="usuario" id="form-usuario" class="form-control"  maxlength="40">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-md-3">
                            <div class="form-group">
                                <label>Senha:</label>
                                <input type="password" id="inp-senha" class="form-control" name="senha" maxlength="40">
                                <input type="checkbox" name="mostrar_senha" value="mostrar" onclick="mostrarSenha();"><span class="fs fs-12"> mostrar senha</span>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <div class="form-group">
                                <label>Nível de Acesso: </label>
                                <select name="nivel" class="form-control">
                                    <option value="0">Selecione um</option>
                                    <option value="1">Administrador</option>
                                    <option value="2">Gerente</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-footer">
                            <input type="button" class="btn btn-success btn-mob" value="Cadastrar" onclick="cadastrarUsuario();">
                            <input type="reset" class="btn btn-danger btn-mob" value="Cancelar">
                        </div>
                    </div>
                </form>
            </section>
        </div>
        <?php include_once('./imports/import_footer.php'); ?>
        <script src="./functionsJS/usuario.js"></script>
    </body>
</html>

