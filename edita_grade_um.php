<!--página do admin-->
<?php
$dia = date('Y-m-d', strtotime($con_seleciona_agendamento['data']));
$mes_num = intval(date('m', strtotime($con_seleciona_agendamento['data'])));
$quantidade_dias = intval($con_seleciona_agendamento['dia']) + 7;
$i = 1;
$dia_inicial = intval(date("d", strtotime($dia . " + " . $i . " days")));
$data_comparativa = $dia;
if (intval(date('d', strtotime($dia . ' + ' . $i . ' days'))) > intval(date('d', strtotime($dia . ' + 14 days')))) {
    echo "<span class='fs fs-16 c-black'>" . $mes[intval($mes_num)] . " - " . $mes[intval(($mes_num + 1))] . "</span><br>";
} else {
    echo "<span class='fs fs-16 c-black'>" . $mes[intval($mes_num)] . "</span><br>";
}
?>
<div class="dias">

    <div class="seta-left" style="opacity: 0.3;">
        <a class="anterior"><i class="fa fa-arrow-circle-left fa-2x c-orange"></i></a>
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

    <div class="seta-right">
        <a href="#" class="proximo"><i class="fa fa-arrow-circle-right fa-2x c-orange"></i></a>
    </div>
</div>


