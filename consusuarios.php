<!DOCTYPE html>
<?php
include_once './php/SessaoUsuario.php';
if ($_SESSION['nivel_acesso'] == 2) {
    header("Location:403.php");
}
unset($_SESSION['usuario_selecionado']);
$pag = 'con';
?>
<html>
    <?php include_once('./imports/import_head.php'); ?>
    <body>
        <?php
        include_once('./imports/import_header.php');
        include_once('./imports/import_menu.php');
        ?>
        <div class="container-fluid">
            <!--MODAL DE CONFIRMAÇÃO DE EXCLUSÃO-->
            <div class="modal fade" id="delete-modal" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-sm" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title"><strong>Excluir Usuário</strong></h4>
                        </div>
                        <div class="modal-body">
                            <p class="h5"><strong>Deseja realmente excluir o usuário?</strong></p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-success" onclick="excluirUsuario();" data-dismiss="modal">Sim</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Não</button>
                        </div>
                    </div>
                </div>
            </div>
            <!--FIM DO MODAL-->
            <div class="main-content">
                <div class="alert ocultar" role="alert">
                    <button type="button" class="close" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <span class="alert-msg"></span>
                </div>
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

