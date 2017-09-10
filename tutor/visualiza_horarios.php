<!DOCTYPE html>
<?php
include_once './php/Sessao.php';
include_once('./php/Conexao.php');

$stmt = $pdo->prepare("select hm.*, us.firstname from tb_horarios_monitor hm, vw_usuarios us where hm.monitor_id = :monitor_id and us.id = :id_us");
$stmt->bindValue(":monitor_id", $_SESSION['tutor_id']);
$stmt->bindValue(":id_us", $_SESSION['tutor_id']);
$stmt->execute();
$con_busca = $stmt->fetch(PDO::FETCH_ASSOC);
?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?php include_once '../layout/AplicationName.php'; ?></title>
        <link rel="stylesheet" href="./tutor.css">
        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="../css/menu.css">
        <link rel="stylesheet" href="../css/bootstrap.css">
        <link rel="stylesheet" href="../css/componentes.css">
        <!--<link rel="stylesheet" href="../aluno/css/aluno.css">-->
        <link rel="stylesheet" href="../css/menu-mobile.css" media="(max-width:760px)">
        <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script type="text/javascript" src="../js/jquery-1.11.1.min.js"></script>
        <style>
            td, th {
                font-family: tahoma;
                font-size: 14px;
                padding-bottom: 5px;
            }
        </style>
    </head>
    <body>

        <div class="container">
            <?php
            include_once '../layout/header.php';
            include_once './btn_sair.php';
            ?>

            <div class="row">
                <div class="col-md-3 col-xs-12 col-sm-4 col-lg-2">
                    <?php include_once './layout/menu.php'; ?>
                </div>

                <div class="col-md-9 col-xs-12 col-sm-8 col-lg-10">
                    <div id="content">
                        <div class="form-edit-monitor">
                            <span class="fs fs-20">Grade de Horários</span>
                            <div class="mg-top-10"></div>
                            <div class="ln-tracejada-1"></div>
                            <div class="mg-top-10"></div>

                            <table>
                                <tr>
                                    <td width="50">
                                        <input disabled type="checkbox" name="seg" value="seg" <?php echo ($con_busca['segunda'] == 'seg') ? 'checked' : ''; ?>> seg:
                                    </td>
                                    <td width="70">
                                        <input disabled type="text" name="seg_ini" class="wdt-70 inp" value="<?php echo $con_busca['seg_ini']; ?>">
                                    </td>
                                    <td width="30">
                                        para
                                    </td>
                                    <td width="70">
                                        <input disabled type="text" name="seg_fim" class="wdt-70 inp" value="<?php echo $con_busca['seg_fim']; ?>">
                                    </td>
                                </tr>

                                <tr>
                                    <td width="50">
                                        <input disabled type="checkbox" name="ter" value="ter" <?php echo ($con_busca['terca'] == 'ter') ? 'checked' : ''; ?>> ter:
                                    </td>
                                    <td width="70">
                                        <input disabled type="text" name="ter_ini" class="wdt-70 inp" value="<?php echo $con_busca['ter_ini']; ?>">
                                    </td>
                                    <td width="30">
                                        para
                                    </td>
                                    <td width="70">
                                        <input disabled type="text" name="ter_fim" class="wdt-70 inp" value="<?php echo $con_busca['ter_fim']; ?>">
                                    </td>
                                </tr>

                                <tr>
                                    <td width="50">
                                        <input disabled type="checkbox" name="qua" value="qua" <?php echo ($con_busca['quarta'] == 'qua') ? 'checked' : ''; ?>> qua:
                                    </td>
                                    <td width="70">
                                        <input disabled type="text" name="qua_ini" class="wdt-70 inp" value="<?php echo $con_busca['qua_ini']; ?>">
                                    </td>
                                    <td width="30">
                                        para
                                    </td>
                                    <td width="70">
                                        <input disabled type="text" name="qua_fim" class="wdt-70 inp" value="<?php echo $con_busca['qua_fim']; ?>">
                                    </td>
                                </tr>

                                <tr>
                                    <td width="50">
                                        <input disabled type="checkbox" name="qui" value="qui" <?php echo ($con_busca['quinta'] == 'qui') ? 'checked' : ''; ?>> qui:
                                    </td>
                                    <td width="70">
                                        <input disabled type="text" name="qui_ini" class="wdt-70 inp" value="<?php echo $con_busca['qui_ini']; ?>">
                                    </td>
                                    <td width="30">
                                        para
                                    </td>
                                    <td width="70">
                                        <input disabled type="text" name="qui_fim" class="wdt-70 inp" value="<?php echo $con_busca['qui_fim']; ?>">
                                    </td>
                                </tr>

                                <tr>
                                    <td width="50">
                                        <input disabled type="checkbox" name="sex" value="sex" <?php echo ($con_busca['sexta'] == 'sex') ? 'checked' : ''; ?>> sex:
                                    </td>
                                    <td width="70">
                                        <input disabled type="text" name="sex_ini" class="wdt-70 inp" value="<?php echo $con_busca['sex_ini']; ?>">
                                    </td>
                                    <td width="30">
                                        para
                                    </td>
                                    <td width="70">
                                        <input disabled type="text" name="sex_fim" class="wdt-70 inp" value="<?php echo $con_busca['sex_fim']; ?>">
                                    </td>
                                </tr>

                                <tr>
                                    <td width="50">
                                        <input disabled type="checkbox" name="sab" value="sab" <?php echo ($con_busca['sabado'] == 'sab') ? 'checked' : ''; ?>> sáb:
                                    </td>
                                    <td width="70">
                                        <input disabled type="text" name="sab_ini" class="wdt-70 inp" value="<?php echo $con_busca['sab_ini']; ?>">
                                    </td>
                                    <td width="30">
                                        para
                                    </td>
                                    <td width="70">
                                        <input disabled type="text" name="sab_fim" class="wdt-70 inp" value="<?php echo $con_busca['sab_fim']; ?>">
                                    </td>
                                </tr>

                                <tr>
                                    <td width="60">
                                        <input disabled type="checkbox" name="dom" value="dom" <?php echo ($con_busca['domingo'] == 'dom') ? 'checked' : ''; ?>> dom:
                                    </td>
                                    <td width="85">
                                        <input disabled type="text" name="dom_ini" class="wdt-70 inp" value="<?php echo $con_busca['dom_ini']; ?>">
                                    </td>
                                    <td width="45">
                                        para
                                    </td>
                                    <td width="70">
                                        <input disabled type="text" name="dom_fim" class="wdt-70 inp" value="<?php echo $con_busca['dom_fim']; ?>">
                                    </td>
                                </tr>

                            </table>
                            <div class="mg-top-10"></div>
                            <span class="fs fs-16">Tempo de Agendamento: <?php echo $con_busca['exibicao_grade'];?> minutos</span>
                        </div>
                    </div>
                </div>

            </div>
            <?php include_once('../layout/footer.php'); ?>
        </div>
    </body>
</html>
