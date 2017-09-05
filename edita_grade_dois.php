<!--pagina admin-->
<?php
$dia = date('Y-m-d', strtotime($con_seleciona_agendamento['data']));
$quantidade_dias = intval($con_seleciona_agendamento['dia'] + 14);
$mes_num = date("m", strtotime($dia." + 8 days"));
$i = 8;
$dia_inicial = intval($con_seleciona_agendamento['dia'] + $i);
if (intval(date('d', strtotime($dia . ' + ' . $i . ' days'))) > intval(date('d', strtotime($dia . ' + 14 days')))) {
    echo "<span class='fs fs-16'>" . $mes[intval($mes_num)] . " - " . $mes[intval(($mes_num + 1))] . "</span><br>";
} else {
    echo "<span class='fs fs-16'>" . $mes[intval($mes_num)] . "</span><br>";
}
?>
<div class="dias">

    <div class="seta-left">
        <a href="#" class="anterior"><i class="fa fa-arrow-circle-left fa-2x c-orange"></i></a>
    </div>
    <?php
    while ($dia_inicial <= $quantidade_dias) {
        ?>
    <div class="dia1" onclick="pintar(this, <?php echo date('d', strtotime($dia . ' + ' . $i . ' days')); ?>, <?php echo intval(date('d', strtotime($dia))); ?>);">
            <center>
                <?php
                echo "<span class='fs fs-14'>" . preg_replace($semana['en'], $semana['short'], date('D', strtotime($dia . ' + ' . $i . ' days'))) . "</span><br>";
                echo "<span class='fs fs-14'>" . date('d', strtotime($dia . ' + ' . $i . ' days')) . "</span>";
                ?>
            </center>
        </div>
        <?php
        $i++;
        $dia_inicial++;
    }
    ?>

    <div class="seta-right" style="opacity: 0.3;">
        <a class="proximo"><i class="fa fa-arrow-circle-right fa-2x c-orange"></i></a>
    </div>
</div>


