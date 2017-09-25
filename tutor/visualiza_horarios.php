<!DOCTYPE html>
<?php
include_once './php/Sessao.php';
include_once('./php/Conexao.php');

$stmt = $pdo->prepare("select hm.*, us.firstname from tb_horarios_monitor hm, vw_usuarios us where hm.monitor_id = :monitor_id and us.id = :id_us");
$stmt->bindValue(":monitor_id", $_SESSION['tutor_id']);
$stmt->bindValue(":id_us", $_SESSION['tutor_id']);
$stmt->execute();
$con_busca = $stmt->fetch(PDO::FETCH_ASSOC);

$pag = 'opt';
?>
<html>
    <?php include_once('./imports/import_head.php'); ?>
    <body>
        <style>
            tr, td {
                padding-top: 6px;
            }
        </style>
        <?php
        include_once('./imports/import_header.php');
        include_once('./imports/import_menu.php');
        ?>
        <div class="container-fluid">
            <section class="main-content">
                <div class="title">Grade de Horários</div>
                <table>
                    <tr>
                        <td width="50">
                            <input disabled type="checkbox" name="seg" value="seg" <?php echo ($con_busca['segunda'] == 'seg') ? 'checked' : ''; ?>> seg:
                        </td>
                        <td width="70">
                            <input disabled type="text" name="seg_ini" class="form-control" value="<?php echo $con_busca['seg_ini']; ?>">
                        </td>
                        <td width="30">
                            para
                        </td>
                        <td width="70">
                            <input disabled type="text" name="seg_fim" class="form-control" value="<?php echo $con_busca['seg_fim']; ?>">
                        </td>
                    </tr>

                    <tr>
                        <td width="50">
                            <input disabled type="checkbox" name="ter" value="ter" <?php echo ($con_busca['terca'] == 'ter') ? 'checked' : ''; ?>> ter:
                        </td>
                        <td width="70">
                            <input disabled type="text" name="ter_ini" class="form-control" value="<?php echo $con_busca['ter_ini']; ?>">
                        </td>
                        <td width="30">
                            para
                        </td>
                        <td width="70">
                            <input disabled type="text" name="ter_fim" class="form-control" value="<?php echo $con_busca['ter_fim']; ?>">
                        </td>
                    </tr>

                    <tr>
                        <td width="50">
                            <input disabled type="checkbox" name="qua" value="qua" <?php echo ($con_busca['quarta'] == 'qua') ? 'checked' : ''; ?>> qua:
                        </td>
                        <td width="70">
                            <input disabled type="text" name="qua_ini" class="form-control" value="<?php echo $con_busca['qua_ini']; ?>">
                        </td>
                        <td width="30">
                            para
                        </td>
                        <td width="70">
                            <input disabled type="text" name="qua_fim" class="form-control" value="<?php echo $con_busca['qua_fim']; ?>">
                        </td>
                    </tr>

                    <tr>
                        <td width="50">
                            <input disabled type="checkbox" name="qui" value="qui" <?php echo ($con_busca['quinta'] == 'qui') ? 'checked' : ''; ?>> qui:
                        </td>
                        <td width="70">
                            <input disabled type="text" name="qui_ini" class="form-control" value="<?php echo $con_busca['qui_ini']; ?>">
                        </td>
                        <td width="30">
                            para
                        </td>
                        <td width="70">
                            <input disabled type="text" name="qui_fim" class="form-control" value="<?php echo $con_busca['qui_fim']; ?>">
                        </td>
                    </tr>

                    <tr>
                        <td width="50">
                            <input disabled type="checkbox" name="sex" value="sex" <?php echo ($con_busca['sexta'] == 'sex') ? 'checked' : ''; ?>> sex:
                        </td>
                        <td width="70">
                            <input disabled type="text" name="sex_ini" class="form-control" value="<?php echo $con_busca['sex_ini']; ?>">
                        </td>
                        <td width="30">
                            para
                        </td>
                        <td width="70">
                            <input disabled type="text" name="sex_fim" class="form-control" value="<?php echo $con_busca['sex_fim']; ?>">
                        </td>
                    </tr>

                    <tr>
                        <td width="50">
                            <input disabled type="checkbox" name="sab" value="sab" <?php echo ($con_busca['sabado'] == 'sab') ? 'checked' : ''; ?>> sáb:
                        </td>
                        <td width="70">
                            <input disabled type="text" name="sab_ini" class="form-control" value="<?php echo $con_busca['sab_ini']; ?>">
                        </td>
                        <td width="30">
                            para
                        </td>
                        <td width="70">
                            <input disabled type="text" name="sab_fim" class="form-control" value="<?php echo $con_busca['sab_fim']; ?>">
                        </td>
                    </tr>

                    <tr>
                        <td width="60">
                            <input disabled type="checkbox" name="dom" value="dom" <?php echo ($con_busca['domingo'] == 'dom') ? 'checked' : ''; ?>> dom:
                        </td>
                        <td width="85">
                            <input disabled type="text" name="dom_ini" class="form-control" value="<?php echo $con_busca['dom_ini']; ?>">
                        </td>
                        <td width="45">
                            para
                        </td>
                        <td width="70">
                            <input disabled type="text" name="dom_fim" class="form-control" value="<?php echo $con_busca['dom_fim']; ?>">
                        </td>
                    </tr>

                </table>
                <br>
                <span class="fs fs-16">Tempo de Agendamento: <?php echo $con_busca['exibicao_grade']; ?> minutos</span>
            </section>
        </div>
        <?php include_once('./imports/import_footer.php');?>
    </body>
</html>
