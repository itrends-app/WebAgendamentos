<!DOCTYPE html>
<?php
include_once './php/SessaoUsuario.php';
try {
    include_once('./php/conexao.php');
    $stmt = $pdo->prepare("select * from tb_usuarios_adm where id = :id");
    $stmt->bindValue(":id", $_SESSION['id_usuario_logado']);
    $stmt->execute();
    $conn = $stmt->fetch(PDO::FETCH_ASSOC);
} catch (Exception $ex) {
    echo $ex->getMessage();
}
$pag = "config";
?>
<html>
    <?php include_once('./imports/import_head.php'); ?>
    <body>
        <?php 
        include_once('./imports/import_header.php'); 
        include_once('./imports/import_menu.php');
        ?>
        <div class="container-fluid">
            <div class="main-content">
                <div class="title">Atualizar Perfil</div>
                <form id="form" name="form_editar_perfil">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nome do Usuário:</label>
                                <input type="text" class="form-control" name="nome_usuario" value="<?php echo $conn['nome_usuario']; ?>">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Usuário:</label>
                                <input type="text" class="form-control" name="usuario" maxlength="40" value="<?php echo $conn['usuario']; ?>">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Senha:</label>
                                <input type="password" id="inp-senha" class="form-control" name="senha" maxlength="40">
                                <input type="checkbox" name="mostrar_senha" value="mostrar" onclick="mostrarSenha();"><span class="fs fs-12"> mostrar senha</span>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-footer">
                            <input type="button" class="btn btn-success" value="Confirmar Edição" onclick="editarUsuario();">
                            <input type="button" class="btn btn-danger" value="Cancelar" onclick="irParaPagina('home.php');">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <?php include_once('./imports/import_footer.php'); ?>
        <script src="./functionsJS/usuario.js"></script>
    </body>
</html>

