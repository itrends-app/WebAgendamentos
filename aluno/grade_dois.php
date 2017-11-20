<?php
$dia = date('Y-m-d', strtotime($data_atual_servidor));
$mes_num = date("m", strtotime($dia." + 8 days"));
$quantidade_dias = intval(date("d", strtotime($data_atual_servidor))) + 14;
$i = 8;
$dia_inicial = intval(date("d", strtotime($data_atual_servidor))) + $i;
if (intval(date('d', strtotime($dia . ' + ' . $i . ' days'))) > intval(date('d', strtotime($dia . ' + 14 days')))) {
    echo "<h3>" . $mes[intval($mes_num)] . " - " . $mes[intval(($mes_num+1))] . "</h3><br>";
} else {
    echo "<h3>" . $mes[intval($mes_num)]."</h3><br>";
}
?>
<div class="dias">

    <div class="seta-left">
        <a href="#" class="anterior"><i class="fa fa-arrow-circle-left fa-2x c-orange"></i></a>
    </div>
    <?php
    while ($dia_inicial <= $quantidade_dias) {
        ?>
        <div class="dia1" onclick="pintar(this, <?php echo date('d', strtotime($dia . ' + ' . $i . ' days'));?>, <?php echo intval(date("d"));?>);">
            <center>
                <?php
                echo preg_replace($semana['en'], $semana['short'], date('D', strtotime($dia . ' + ' . $i . ' days'))) . "<br>";
                echo date('d', strtotime($dia . ' + ' . $i . ' days'));
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


