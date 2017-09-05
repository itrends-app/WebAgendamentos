<!DOCTYPE html>
<?php
include_once './php/SessaoUsuario.php';
if($_SESSION['nivel_acesso'] == 2) {
    header("Location:403.php");
}
if(!isset($_SESSION['usuario_selecionado'])) {
    header("Location:consulta_usuarios.php");
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

?>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="UTF-8">
        <title><?php include_once './layout/AplicationName.php';?></title>
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/menu.css">
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/componentes.css">
        <link rel="stylesheet" href="css/aluno.css">
        <link rel="stylesheet" href="css/menu-mobile.css" media="(max-width:760px)">
        <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
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
                            <!--Mensagem de retorno-->
                            <div class="mensagem">
                                <span class="fs fs-16 c-white"></span>
                                <a href="#" onclick="fecharMsgErro();" style="float:right;"><i class="fa fa-close c-white"></i></a>
                            </div>

                            <span class="fs fs-20 c-black">Editar Usuário</span><br>
                            <span class="fs fs-14 c-orange"><?php echo $conn['usuario']; ?></span>
                            <div class="mg-top-10"></div>
                            <div class="ln-tracejada-1"></div>
                            <div class="mg-top-10"></div>

                            <form id="form" name="form_consulta_usuario">
                                <span class="fs fs-16">Nome do Usuário:</span><br>
                                <input type="text" class="inp inp-catolica hgt-35 wdt-400 fs" name="nome_usuario" value="<?php echo $conn['nome_usuario']; ?>">
                                <div class="mg-top-10"></div>

                                <span class="fs fs-16">Usuário:</span><br>
                                <input type="text" class="inp inp-catolica hgt-35 wdt-400 fs" name="usuario" maxlength="40" value="<?php echo $conn['usuario']; ?>">
                                <div class="mg-top-10"></div>

                                <span class="fs fs-16">Senha:</span><br>
                                <input type="password" id="inp-senha" class="inp inp-catolica hgt-35 wdt-400 fs" name="senha" maxlength="40">
                                <input type="checkbox" name="mostrar_senha" value="mostrar" onclick="mostrarSenha();"><span class="fs fs-12"> mostrar senha</span>
                                <div class="mg-top-10"></div>

                                <span class="fs fs-16">Nível de Acesso: </span><br>
                                <select name="nivel" class="wdt-400 hgt-35">
                                    <option value="0">Selecione um</option>
                                    <option value="1" <?php echo ($conn['nivel_acesso'] == 1) ? 'selected' : ''; ?>>Administrador</option>
                                    <option value="2" <?php echo ($conn['nivel_acesso'] == 2) ? 'selected' : ''; ?>>Gerente</option>
                                </select>

                                <div class="mg-top-10"></div>
                                <div class="ln-tracejada-1"></div>
                                <div class="mg-top-10"></div>
                                <center>
                                    <input type="button" class="button" value="Cancelar" onclick="irParaPagina('consulta_usuarios.php');">
                                    <input type="button" class="button button-orange" value="Confirmar Edição" onclick="editarUsuario();">
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
    function editarUsuario() {
        var dados = $('#form').serialize();
        $.ajax({
            type:'post',
            dataType: 'html',
            url: "./php/EditarUsuario.php",
            data: dados,
            success: function (msg) {
                if(msg === "ok") {
                    $('.mensagem span').html('Informações do usuário editadas com sucesso!');
                    $('.mensagem').css('display', 'block').css('background-color', '#32BF32').removeClass('bg-red-60');
                } else {
                    $('.mensagem span').html('Erro ao tentar editar as informações do usuário!');
                    $('.mensagem').css('display', 'block').addClass('bg-red-60');
                }
            }
        });
    }
    function mostrarSenha() {
        var mst = this.form_consulta_usuario.mostrar_senha;
        if (mst.checked) {
            this.form_consulta_usuario.senha.type = 'text';
        } else {
            this.form_consulta_usuario.senha.type = 'password';
        }
    }
    function irParaPagina(url) {
        location.href=url;
    }
    function fecharMsgErro() {
        $('.mensagem').css('display', 'none').css('transition', '1s');
    }
    
</script>
