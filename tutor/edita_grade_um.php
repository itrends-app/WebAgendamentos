<!--página do tutor-->
<?php
$dia = date('Y-m-d', strtotime($con_seleciona_agendamento['data']));
$mes_num = intval(date('m', strtotime($con_seleciona_agendamento['data'])));
$quantidade_dias = intval($con_seleciona_agendamento['dia']) + 8;
$i = 1;
$dia_inicial = intval($con_seleciona_agendamento['dia'] + $i);
if (intval(date('d', strtotime($dia . ' + ' . $i . ' days'))) > intval(date('d', strtotime($dia . ' + 7 days')))) {
    echo "<span class='fs fs-16 c-black'>" . $mes[intval($mes_num)] . " - " . $mes[intval(($mes_num + 1))] . "</span><br>";
} else {
    echo "<span class='fs fs-16 c-black'>" . $mes[intval($mes_num)] . "</span><br>";
}
?>
<div class="dias">

    <?php
    while ($dia_inicial <= $quantidade_dias) {
        ?>
        <div class="dia1" onclick="pintar(this,<?php echo date('d', strtotime($dia . ' + ' . $i . ' days')); ?>,<?php echo intval($con_seleciona_agendamento['dia']); ?>);">
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

</div>


