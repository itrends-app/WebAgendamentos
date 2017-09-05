<!--<div id="btn-hover"><a href="#"><i class="fa fa-bars fa-2x"></i></a></div>-->

<div class="row">
    <div class="col-xs-1 col-sm-1">
<!--        <div class="btn-hover">
            <a href="#"><img src="./images/bars.png" width="32" height="32" alt=""></a>
        </div>-->
    </div>
</div>

<div id="menu-principal">

    <div class="item-menu"><a href="index.php"><i class="fa fa-home"></i> Home</a></div>

    <div class="item-menu down">
        <a href="#">
            <i class="fa fa-bars"></i> Opções
            <i class="fa fa-angle-down x-p1" style="float: right; padding: 7px 5px 0 0;" id="dw"></i>
            <i class="fa fa-angle-up x-p2" style="float: right;display:none; padding: 7px 5px 0 0;" id="up"></i>
        </a>
    </div>
    <div class="submenu sb1"><a href="consulta_agendamentos.php"><i class="fa fa-check"></i>  Agendamentos</a></div>
    <div class="submenu sb1"><a href="reagendar_horario.php"><i class="fa fa-check"></i>  Reagendar</a></div>
    <div class="submenu sb1"><a href="visualiza_horarios.php"><i class="fa fa-check"></i>  Grade de Horários</a></div>
    <div class="submenu sb1"><a href="consulta_agendamentos.php"><i class="fa fa-check"></i>  Cadastrar Avaliação</a></div>
    
    <div class="item-menu down2">
        <a href="#">
            <i class="fa fa-print"></i> Relatórios
            <i class="fa fa-angle-down x-p1" style="float: right; padding: 7px 5px 0 0;" id="dw2"></i>
            <i class="fa fa-angle-up x-p2" style="float: right;display:none; padding: 7px 5px 0 0;" id="up2"></i>
        </a>
    </div>
    <div class="submenu sb2"><a href="gera_relatorio_agendamentos.php"><i class="fa fa-check"></i>  Agendamentos</a></div>
    
</div>


<script type="text/javascript" src="../js/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="../js/jquery.mask.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        //menu cadastro
        var cont = 0;
        $("#menu-principal .down").click(function () {
            if (cont == 0) {
                $("#menu-principal .submenu.sb1").css("display", "block");
                $("#menu-principal #dw").css("display", "none");
                $("#menu-principal #up").css("display", "block");
                $(".down a").css("border-radius", "8px 8px 0 0");
                $(".down a").css("background-color", "#ec6907").css("color", "#fff");
                cont = 1;
            } else {
                $("#menu-principal .submenu.sb1").css("display", "none");
                $("#menu-principal #dw").css("display", "block");
                $("#menu-principal #up").css("display", "none");
                $(".down a").css("border-radius", "8px");
                $(".down a").css("background-color", "#bbb").css("color", "#333");
                cont = 0;
            }
        });
        
        //menu consulta
        var cont3 = 0;
        $("#menu-principal .down2").click(function () {
            if (cont3 === 0) {
                $("#menu-principal .submenu.sb2").css("display", "block");
                $("#menu-principal #dw2").css("display", "none");
                $("#menu-principal #up2").css("display", "block");
                $(".down2 a").css("border-radius", "8px 8px 0 0");
                $(".down2 a").css("background-color", "#ec6907").css("color", "#fff");
                cont3 = 1;
            } else {
                $("#menu-principal .submenu.sb2").css("display", "none");
                $("#menu-principal #dw2").css("display", "block");
                $("#menu-principal #up2").css("display", "none");
                $(".down2 a").css("border-radius", "8px");
                $(".down2 a").css("background-color", "#bbb").css("color", "#333");
                cont3 = 0;
            }
        });
        
        //menu configurações
        var cont4 = 0;
        $("#menu-principal .down3").click(function () {
            if (cont4 === 0) {
                $("#menu-principal .submenu.sb3").css("display", "block");
                $("#menu-principal #dw3").css("display", "none");
                $("#menu-principal #up3").css("display", "block");
                $(".down3 a").css("border-radius", "8px 8px 0 0");
                $(".down3 a").css("background-color", "#ec6907").css("color", "#fff");
                cont4 = 1;
            } else {
                $("#menu-principal .submenu.sb3").css("display", "none");
                $("#menu-principal #dw3").css("display", "block");
                $("#menu-principal #up3").css("display", "none");
                $(".down3 a").css("border-radius", "8px");
                $(".down3 a").css("background-color", "#bbb").css("color", "#333");
                cont4 = 0;
            }
        });
        
        //menu relatórios
        var cont5 = 0;
        $("#menu-principal .down4").click(function () {
            if (cont5 === 0) {
                $("#menu-principal .submenu.sb4").css("display", "block");
                $("#menu-principal #dw4").css("display", "none");
                $("#menu-principal #up4").css("display", "block");
                $(".down4 a").css("border-radius", "8px 8px 0 0");
                $(".down4 a").css("background-color", "#ec6907").css("color", "#fff");
                cont5 = 1;
            } else {
                $("#menu-principal .submenu.sb4").css("display", "none");
                $("#menu-principal #dw4").css("display", "block");
                $("#menu-principal #up4").css("display", "none");
                $(".down4 a").css("border-radius", "8px");
                $(".down4 a").css("background-color", "#bbb").css("color", "#333");
                cont5 = 0;
            }
        });

        var cont2 = 0;
        $(".btn-hover").click(function () {
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
        });
    });
</script>
