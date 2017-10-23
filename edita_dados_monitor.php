<!DOCTYPE html>
<?php
include_once './php/SessaoUsuario.php';
if (!isset($_SESSION['monitor'])) {
    header("location:cad_monitor.php");
}
try {
    include_once('./php/conexao.php');

    $stmt = $pdo->prepare("select hm.*, us.firstname from tb_horarios_monitor hm, vw_usuarios us where hm.monitor_id = :monitor_id and us.id = :id_us");
    $stmt->bindValue(":monitor_id", $_SESSION['monitor']);
    $stmt->bindValue(":id_us", $_SESSION['monitor']);
    $stmt->execute();
    $con_busca = $stmt->fetch(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo $e->getMessage();
}
?>
<html>
    <?php include_once('./imports/import_head.php'); ?>
    <body>
        <?php
        include_once('./imports/import_header.php');
        include_once('./imports/import_menu.php');
        ?>
        <div class="container">
            <section class="main-content">
                <div class="title">Editar Dados do Tutor<br><span class="fs fs-14 c-orange"><?php echo $con_busca['firstname']; ?></span></div>

                <div class="alert ocultar" role="alert">
                    <button type="button" class="close" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <span class="alert-msg"></span>
                </div>

                <form method="post" id="form-edicao" action="" name="formHorario">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Status: </label>
                                <select name="status" class="form-control" >
                                    <option value="Habilitado" <?php echo ($con_busca['status'] == 'Habilitado') ? 'selected' : ''; ?>>Habilitado</option>
                                    <option value="Desabilitado" <?php echo ($con_busca['status'] == 'Desabilitado') ? 'selected' : ''; ?>>Desabilitado</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <table class="org-table">
                                <tr>
                                    <td width="60">
                                        <input type="checkbox" name="seg" value="seg" <?php echo ($con_busca['segunda'] == 'seg') ? 'checked' : ''; ?>> seg:
                                    </td>
                                    <td>
                                        <input type="text" name="seg_ini" class="form-control mask" value="<?php echo $con_busca['seg_ini']; ?>">
                                    </td>
                                    <td width="40">
                                        &ensp;até
                                    </td>
                                    <td>
                                        <input type="text" name="seg_fim" class="form-control mask" value="<?php echo $con_busca['seg_fim']; ?>">
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <input type="checkbox" name="ter" value="ter" <?php echo ($con_busca['terca'] == 'ter') ? 'checked' : ''; ?>> ter:
                                    </td>
                                    <td>
                                        <input type="text" name="ter_ini" class="form-control mask" value="<?php echo $con_busca['ter_ini']; ?>">
                                    </td>
                                    <td>
                                        &ensp;até
                                    </td>
                                    <td>
                                        <input type="text" name="ter_fim" class="form-control mask" value="<?php echo $con_busca['ter_fim']; ?>">
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <input type="checkbox" name="qua" value="qua" <?php echo ($con_busca['quarta'] == 'qua') ? 'checked' : ''; ?>> qua:
                                    </td>
                                    <td>
                                        <input type="text" name="qua_ini" class="form-control mask" value="<?php echo $con_busca['qua_ini']; ?>">
                                    </td>
                                    <td>
                                        &ensp;até
                                    </td>
                                    <td>
                                        <input type="text" name="qua_fim" class="form-control mask" value="<?php echo $con_busca['qua_fim']; ?>">
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <input type="checkbox" name="qui" value="qui" <?php echo ($con_busca['quinta'] == 'qui') ? 'checked' : ''; ?>> qui:
                                    </td>
                                    <td>
                                        <input type="text" name="qui_ini" class="form-control mask" value="<?php echo $con_busca['qui_ini']; ?>">
                                    </td>
                                    <td>
                                        &ensp;até
                                    </td>
                                    <td>
                                        <input type="text" name="qui_fim" class="form-control mask" value="<?php echo $con_busca['qui_fim']; ?>">
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <input type="checkbox" name="sex" value="sex" <?php echo ($con_busca['sexta'] == 'sex') ? 'checked' : ''; ?>> sex:
                                    </td>
                                    <td>
                                        <input type="text" name="sex_ini" class="form-control mask" value="<?php echo $con_busca['sex_ini']; ?>">
                                    </td>
                                    <td>
                                        &ensp;até
                                    </td>
                                    <td>
                                        <input type="text" name="sex_fim" class="form-control mask" value="<?php echo $con_busca['sex_fim']; ?>">
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <input type="checkbox" name="sab" value="sab" <?php echo ($con_busca['sabado'] == 'sab') ? 'checked' : ''; ?>> sáb:
                                    </td>
                                    <td>
                                        <input type="text" name="sab_ini" class="form-control mask" value="<?php echo $con_busca['sab_ini']; ?>">
                                    </td>
                                    <td>
                                        &ensp;até
                                    </td>
                                    <td>
                                        <input type="text" name="sab_fim" class="form-control mask" value="<?php echo $con_busca['sab_fim']; ?>">
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <input type="checkbox" name="dom" value="dom" <?php echo ($con_busca['domingo'] == 'dom') ? 'checked' : ''; ?>> dom:
                                    </td>
                                    <td>
                                        <input type="text" name="dom_ini" class="form-control mask" value="<?php echo $con_busca['dom_ini']; ?>">
                                    </td>
                                    <td>
                                        &ensp;até
                                    </td>
                                    <td>
                                        <input type="text" name="dom_fim" class="form-control mask" value="<?php echo $con_busca['dom_fim']; ?>">
                                    </td>
                                </tr>

                            </table>
                        </div>

                        <div class="col-md-5">
                            <table class="org-table">
                                <tr>
                                    <td width="155" class="direita">Exibição de Grade:</td>
                                    <td width="150">
                                        <select class="form-control" name="grade">
                                            <option value="15" <?php echo ($con_busca['exibicao_grade'] == 15) ? 'selected' : ''; ?>>15</option>
                                            <option value="30" <?php echo ($con_busca['exibicao_grade'] == 30) ? 'selected' : ''; ?>>30</option>
                                            <option value="45" <?php echo ($con_busca['exibicao_grade'] == 45) ? 'selected' : ''; ?>>45</option>
                                            <option value="60" <?php echo ($con_busca['exibicao_grade'] == 60) ? 'selected' : ''; ?>>60</option>
                                        </select>
                                    </td>
                                    <td>&ensp;min</td>
                                </tr>

                                <tr>
                                    <td class="direita">Agendamento Mínimo:</td>
                                    <td>
                                        <select class="form-control" name="agend_min">
                                            <option value="15" <?php echo ($con_busca['agend_minimo'] == 15) ? 'selected' : ''; ?>>15</option>
                                            <option value="30" <?php echo ($con_busca['agend_minimo'] == 30) ? 'selected' : ''; ?>>30</option>
                                            <option value="45" <?php echo ($con_busca['agend_minimo'] == 45) ? 'selected' : ''; ?>>45</option>
                                            <option value="60" <?php echo ($con_busca['agend_minimo'] == 60) ? 'selected' : ''; ?>>60</option>
                                        </select>
                                    </td>
                                    <td>&ensp;min</td>
                                </tr>

                                <tr>
                                    <td class="direita">Agendamento Padrão:</td>
                                    <td>
                                        <select class="form-control" name="agend_padrao">
                                            <option value="30" <?php echo ($con_busca['agend_padrao'] == 30) ? 'selected' : ''; ?>>30</option>
                                            <option value="60" <?php echo ($con_busca['agend_padrao'] == 60) ? 'selected' : ''; ?>>60</option>
                                        </select>
                                    </td>
                                    <td>&ensp;min</td>
                                </tr>

                                <tr>
                                    <td class="direita">Agendamento Máximo:</td>
                                    <td>
                                        <select class="form-control" name="agend_max">
                                            <option value="30" <?php echo ($con_busca['agend_maximo'] == 30) ? 'selected' : ''; ?>>30</option>
                                            <option value="60" <?php echo ($con_busca['agend_maximo'] == 60) ? 'selected' : ''; ?>>60</option>
                                            <option value="90" <?php echo ($con_busca['agend_maximo'] == 90) ? 'selected' : ''; ?>>90</option>
                                            <option value="120" <?php echo ($con_busca['agend_maximo'] == 120) ? 'selected' : ''; ?>>120</option>
                                        </select>
                                    </td>
                                    <td>&ensp;min</td>
                                </tr>

                            </table>

                            <br><br>

                            <table class="org-table">
                                <tr>
                                    <td>Pausa&ensp;</td>
                                    <td><input type="text" name="pausa" class="form-control mask" value="<?php echo $con_busca['pausa']; ?>"></td>
                                    <td width="75">&ensp;Retorno </td>
                                    <td><input type="text" name="retorno" class="form-control mask" value="<?php echo $con_busca['retorno']; ?>"></td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <br>
                    <div class="panel panel-default">
                        <div class="panel-footer">
                            <input type="button" value="Confirmar Edição" class="btn btn-success" onclick="confirmarEdicao();"> 
                            <a href="cadastrotutor.php"><input type="button" value="Voltar" class="btn btn-danger"></a>
                        </div>
                    </div>
                </form>
            </section>

        </div>
        <?php
        include_once('./imports/import_footer.php');
        ?>
        <script type="text/javascript" src="js/valida_hora.js"></script>
        <script src="./functionsJS/edita_tutor.js"></script>


    </body>
</html>
