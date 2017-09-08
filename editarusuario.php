<!DOCTYPE html>
<?php
include_once './php/SessaoUsuario.php';
//if($_SESSION['nivel_acesso'] == 2) {
//    header("Location:403.php");
//}
if (!isset($_SESSION['usuario_selecionado'])) {
    header("Location:consusuarios.php");
}
try {
    include_once('./php/conexao.php');
    $stmt = $pdo->prepare("select * from tb_usuarios_adm where id = :id");
    $stmt->bindValue(":id", $_SESSION['usuario_selecionado']);
    $stmt->execute();
    $conn = $stmt->fetch(PDO::FETCH_ASSOC);
} catch (Exception $ex) {
    echo $ex->getMessage();
}
$pag = 'con';
?>
<html>
    <?php
    include_once('./imports/import_head.php');
    ?>
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
                <div class="title">Editar Usuário</div>
                <form id="form" name="form_consulta_usuario">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nome do Usuário:</label>
                                <input type="text" class="form-control text-uppercase" name="nome_usuario" value="<?php echo $conn['nome_usuario']; ?>">
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
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Senha:</label>
                                <input type="password" id="inp-senha" class="form-control" name="senha" maxlength="40">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <input type="checkbox" class="mg-top-30" name="mostrar_senha" value="mostrar" onclick="mostrarSenha();"><span> mostrar senha</span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nível de Acesso: </label>
                                <select name="nivel" class="form-control">
                                    <option value="0">Selecione um</option>
                                    <option value="1" <?php echo ($conn['nivel_acesso'] == 1) ? 'selected' : ''; ?>>Administrador</option>
                                    <option value="2" <?php echo ($conn['nivel_acesso'] == 2) ? 'selected' : ''; ?>>Gerente</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="panel panel-default">
                        <div class="panel-footer">
                            <input type="button" class="btn btn-success btn-mob" value="Confirmar Edição" onclick="editarUsuario();">
                            <input type="button" class="btn btn-danger btn-mob" value="Cancelar" onclick="irParaPagina('consusuarios.php');">
                        </div>
                    </div>
                </form>
            </section>
        </div>
        <?php include_once('./imports/import_footer.php'); ?>
        <script src="functionsJS/usuario.js"></script>
    </body>
</html>

