<?php
include_once '../php/limpa_sessao.php';
?>
<style>
    .tr,td {
        border: none;
    }
</style>
<div id="header">
    <div class="bloco">
        <a class="menu-mobile" onclick="mostrarMenu();"><i class="fa fa-bars c-white"></i></a>
        <img src="./images/Logo_NEAD_Branco.png" alt="" width="120" height="75" class="img-nead" style="margin-left: 10px;">
    </div>
    <?php if (isset($_SESSION['nome_usuario'])) { ?>
        <div class="user-logado">
            <table>
                <tr>
                    <td style="text-align: center; width: 45px;">
                        <div class="icon-user2">
                            <i class="fa fa-user fa-2x c-white"></i>
                        </div>
                    </td>

                    <td>
                        <div class="name-user"></div>
                    </td>
                </tr>
            </table>
        </div>
    <?php } ?>

</div>
<script>
    var cont2 = 0;
    function mostrarMenu() {
        if (cont2 == 0) {
            $("#menu-principal").removeClass("esconder");
            $("#menu-principal").addClass("mostrar");
            $("#menu-principal").css("transition", "1s");
            cont2 = 1;
        } else {
            $("#menu-principal").removeClass("mostrar");
            $("#menu-principal").addClass("esconder");
            $("#menu-principal").css("transition", "1s");
            cont2 = 0;
        }
    }
    
    var nome_usuario = '<?php echo $_SESSION['nome_usuario'];?>';
    if (screen.width > 600) {
        $('.name-user').html('<span class="fs fs-14 c-white"><?php echo $_SESSION['nome_usuario']; ?></span>');
    } else if(screen.width <= 600 && nome_usuario.length > 14){
        $('.name-user').html('<span class="fs fs-14 c-white"><?php echo substr($_SESSION['nome_usuario'], 0, 13); ?>...</span>');
    } else {
        $('.name-user').html('<span class="fs fs-14 c-white">'+nome_usuario+'</span>');
    }
</script>

