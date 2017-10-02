
<div class="seg">
    <div class="grade-horarios">

        <?php
        if ($con['segunda'] == "seg") {
            $seg_qtd = (($con['seg_fim'] * 60) - ($con['seg_ini'] * 60)) / $grade;
            $dd_seg = date_create('2000-01-01' . $con['seg_ini']);
            for ($c = 1; $c <= $seg_qtd; $c++) {
                $hora = date_format($dd_seg, 'H:i');
                if ($hora < $con['pausa'] || $hora >= $con['retorno']) {
                    ?>
                    <a href="#" class="cad_horario"><?php echo date_format($dd_seg, "H:i"); ?></a>
                    <?php
                }
                date_add($dd_seg, date_interval_create_from_date_string($grade . ' minutes'));
            }
        }
        ?>
    </div>
</div>

<div class="ter">
    <div class="grade-horarios">
        <?php
        if ($con['terca'] == "ter") {
            $ter_qtd = (($con['ter_fim'] * 60) - ($con['ter_ini'] * 60)) / $grade;
            $dd_ter = date_create('2000-01-01' . $con['ter_ini']);
            for ($c = 1; $c <= $ter_qtd; $c++) {
                $hora = date_format($dd_ter, 'H:i');
                if ($hora < $con['pausa'] || $hora >= $con['retorno']) {
                    ?>
                    <a href="#" class="cad_horario">
                        <?php echo date_format($dd_ter, 'H:i'); ?></a>
                    <?php
                }
                date_add($dd_ter, date_interval_create_from_date_string($grade . ' minutes'));
            }
        }
        ?>
    </div>
</div>

<div class="qua">
    <div class="grade-horarios">
        <?php
        if ($con['quarta'] == "qua") {
            $qua_qtd = (($con['qua_fim'] * 60) - ($con['qua_ini'] * 60)) / $grade;
            $dd_qua = date_create('2000-01-01' . $con['qua_ini']);
            for ($c = 1; $c <= $qua_qtd; $c++) {
                $hora = date_format($dd_qua, 'H:i');
                if ($hora < $con['pausa'] || $hora >= $con['retorno']) {
                    ?>
                    <a href="#" class="cad_horario">
                        <?php echo date_format($dd_qua, 'H:i'); ?></a>
                    <?php
                }
                date_add($dd_qua, date_interval_create_from_date_string($grade . ' minutes'));
            }
        }
        ?>
    </div>
</div>

<div class="qui">
    <div class="grade-horarios">
        <?php
        if ($con['quinta'] == "qui") {
            $qui_qtd = (($con['qui_fim'] * 60) - ($con['qui_ini'] * 60)) / $grade;
            $dd_qui = date_create('2000-01-01' . $con['qui_ini']);
            for ($c = 1; $c <= $qui_qtd; $c++) {
                $hora = date_format($dd_qui, 'H:i');
                if ($hora < $con['pausa'] || $hora >= $con['retorno']) {
                    ?>
                    <a href="#" class="cad_horario">
                        <?php echo date_format($dd_qui, 'H:i'); ?></a>
                    <?php
                }
                date_add($dd_qui, date_interval_create_from_date_string($grade . ' minutes'));
            }
        }
        ?>
    </div>
</div>

<div class="sex">
    <div class="grade-horarios">
        <?php
        if ($con['sexta'] == "sex") {
            $sex_qtd = (($con['sex_fim'] * 60) - ($con['sex_ini'] * 60)) / $grade;
            $dd_sex = date_create('2000-01-01' . $con['sex_ini']);
            for ($c = 1; $c <= $sex_qtd; $c++) {
                $hora = date_format($dd_sex, 'H:i');
                if ($hora < $con['pausa'] || $hora >= $con['retorno']) {
                    ?>
                    <a href="#" class="cad_horario">
                        <?php echo date_format($dd_sex, 'H:i'); ?></a>
                    <?php
                }
                date_add($dd_sex, date_interval_create_from_date_string($grade . ' minutes'));
            }
        }
        ?>
    </div>
</div>

<div class="sab">
    <div class="grade-horarios">
        <?php
        if ($con['sabado'] == "sab") {
            $sab_qtd = (($con['sab_fim'] * 60) - ($con['sab_ini'] * 60)) / $grade;
            $dd_sab = date_create('2000-01-01' . $con['sab_ini']);
            for ($c = 1; $c <= $sab_qtd; $c++) {
                $hora = date_format($dd_sab, 'H:i');
                if ($hora < $con['pausa'] || $hora >= $con['retorno']) {
                    ?>
                    <a href="#" class="cad_horario">
                        <?php echo date_format($dd_sab, 'H:i'); ?></a>
                    <?php
                }
                date_add($dd_sab, date_interval_create_from_date_string($grade . ' minutes'));
            }
        }
        ?>
    </div>
</div>

<div class="dom">
    <div class="grade-horarios">
        <?php
        if ($con['domingo'] == "dom") {
            $dom_qtd = (($con['dom_fim'] * 60) - ($con['dom_ini'] * 60)) / $grade;
            $dd_dom = date_create('2000-01-01' . $con['dom_ini']);
            for ($c = 1; $c <= $ter_qtd; $c++) {
                $hora = date_format($dd_dom, 'H:i');
                if ($hora < $con['pausa'] || $hora >= $con['retorno']) {
                    ?>
                    <a href="#" class="cad_horario">
                        <?php echo date_format($dd_dom, 'H:i'); ?></a>
                        <?php
                    }
                    date_add($dd_dom, date_interval_create_from_date_string($grade . ' minutes'));
                }
            }
            ?>
    </div>

</div>

<script type="text/javascript">
    $(document).ready(function () {
        
    });
</script>