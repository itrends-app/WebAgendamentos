<!DOCTYPE html>
<?php
//include_once './php/SessaoUsuario.php';
//if ($_SESSION['nivel_acesso'] == 2) {
//    header("Location:403.php");
//}
//unset($_SESSION['usuario_selecionado']);
?>
<html>
    <?php include_once('./imports/import_head.php'); ?>
    <body>
        <?php include_once('./imports/import_header.php'); ?>
        <div class="container-fluid">
            <div class="main-content">
                <div class="title">Consulta de Usuários</div>
                <form name="form_consulta_usuario" autocomplete="off" class="form-inline">
                    <input type="text" class="form-control" name="pesquisa" size="60">
                    <input type="button" class="btn btn-success btn-mob" value="Consultar" onclick="pesquisar();">
                </form>
                <div class="table-responsive space-top">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Usuário</th>
                                <th>Nome de Usuário</th>
                                <th>Nível de Acesso</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody id="usr-table">

                        </tbody>
                    </table>
                </div>
            </div>                        
        </div>    
        <?php include_once('./imports/import_footer.php'); ?>
        <script src="./functionsJS/usuario.js"></script>
    </body>
</html>

