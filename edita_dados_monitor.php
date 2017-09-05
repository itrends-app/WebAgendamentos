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
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="UTF-8">
        <title><?php include_once './layout/AplicationName.php'; ?></title>
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/menu.css">
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/componentes.css">
        <link rel="stylesheet" href="css/menu-mobile.css" media="(max-width:760px)">
        <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <style type="text/css">
            .direita {
                text-align: right;
                padding-right: 10px;
            }
            
            td, th {
                font-family: tahoma;
                font-size: 14px;
                padding-bottom: 5px;
            }
            tr, td {
                border:none;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <?php
            include_once './layout/header.php';
            ?>

            <div class="row">
                <div class="col-md-3 col-xs-12 col-sm-4 col-lg-2">
                    <?php
                    include_once './layout/menu.php';
                    ?>
                </div>
                <div class="col-md-9 col-xs-12 col-sm-8 col-lg-10">
                    <div id="content">

                        <!--Editar dados referente ao horário do monitor-->

                        <div class="form-edit-monitor">

                            <div class="mensagem bg-red-60">
                                <span class="fs fs-14 c-white">Monitor não cadastrado, por favor cadastre o monitor em um curso para prosseguir!</span>
                                <a href="#" onclick="fecharMsgErro();" style="float:right;"><i class="fa fa-close c-white"></i></a>
                            </div>

                            <div class="bloco">
                                <span class="fs fs-20">Editar Dados do Monitor</span><br>
                                <span class="fs fs-14 c-orange"><?php echo $con_busca['firstname']; ?></span>
                            </div>
                            <div class="mg-top-10"></div>
                            <div class="ln-tracejada-1"></div>
                            <div class="mg-top-10"></div>



                            <form method="post" id="form-edicao" action="" name="formHorario">
                                <div class="row">
                                    <div class="col-md-6 col-lg-4 col-xs-12">
                                        <div class="bloco">
                                            <span class="fs fs-14">Status: </span>
                                            <select name="status" class="wdt-300" >
                                                <option value="Habilitado" <?php echo ($con_busca['status'] == 'Habilitado') ? 'selected' : ''; ?>>Habilitado</option>
                                                <option value="Desabilitado" <?php echo ($con_busca['status'] == 'Desabilitado') ? 'selected' : ''; ?>>Desabilitado</option>
                                            </select>

                                            <div class="mg-top-10"></div>
                                            <table>
                                                <tr>
                                                    <td width="50">
                                                        <input type="checkbox" name="seg" value="seg" <?php echo ($con_busca['segunda'] == 'seg') ? 'checked' : ''; ?>> seg:
                                                    </td>
                                                    <td width="70">
                                                        <input type="text" name="seg_ini" class="wdt-70 inp" value="<?php echo $con_busca['seg_ini']; ?>">
                                                    </td>
                                                    <td width="30">
                                                        para
                                                    </td>
                                                    <td width="70">
                                                        <input type="text" name="seg_fim" class="wdt-70 inp" value="<?php echo $con_busca['seg_fim']; ?>">
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td width="50">
                                                        <input type="checkbox" name="ter" value="ter" <?php echo ($con_busca['terca'] == 'ter') ? 'checked' : ''; ?>> ter:
                                                    </td>
                                                    <td width="70">
                                                        <input type="text" name="ter_ini" class="wdt-70 inp" value="<?php echo $con_busca['ter_ini']; ?>">
                                                    </td>
                                                    <td width="30">
                                                        para
                                                    </td>
                                                    <td width="70">
                                                        <input type="text" name="ter_fim" class="wdt-70 inp" value="<?php echo $con_busca['ter_fim']; ?>">
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td width="50">
                                                        <input type="checkbox" name="qua" value="qua" <?php echo ($con_busca['quarta'] == 'qua') ? 'checked' : ''; ?>> qua:
                                                    </td>
                                                    <td width="70">
                                                        <input type="text" name="qua_ini" class="wdt-70 inp" value="<?php echo $con_busca['qua_ini']; ?>">
                                                    </td>
                                                    <td width="30">
                                                        para
                                                    </td>
                                                    <td width="70">
                                                        <input type="text" name="qua_fim" class="wdt-70 inp" value="<?php echo $con_busca['qua_fim']; ?>">
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td width="50">
                                                        <input type="checkbox" name="qui" value="qui" <?php echo ($con_busca['quinta'] == 'qui') ? 'checked' : ''; ?>> qui:
                                                    </td>
                                                    <td width="70">
                                                        <input type="text" name="qui_ini" class="wdt-70 inp" value="<?php echo $con_busca['qui_ini']; ?>">
                                                    </td>
                                                    <td width="30">
                                                        para
                                                    </td>
                                                    <td width="70">
                                                        <input type="text" name="qui_fim" class="wdt-70 inp" value="<?php echo $con_busca['qui_fim']; ?>">
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td width="50">
                                                        <input type="checkbox" name="sex" value="sex" <?php echo ($con_busca['sexta'] == 'sex') ? 'checked' : ''; ?>> sex:
                                                    </td>
                                                    <td width="70">
                                                        <input type="text" name="sex_ini" class="wdt-70 inp" value="<?php echo $con_busca['sex_ini']; ?>">
                                                    </td>
                                                    <td width="30">
                                                        para
                                                    </td>
                                                    <td width="70">
                                                        <input type="text" name="sex_fim" class="wdt-70 inp" value="<?php echo $con_busca['sex_fim']; ?>">
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td width="50">
                                                        <input type="checkbox" name="sab" value="sab" <?php echo ($con_busca['sabado'] == 'sab') ? 'checked' : ''; ?>> sáb:
                                                    </td>
                                                    <td width="70">
                                                        <input type="text" name="sab_ini" class="wdt-70 inp" value="<?php echo $con_busca['sab_ini']; ?>">
                                                    </td>
                                                    <td width="30">
                                                        para
                                                    </td>
                                                    <td width="70">
                                                        <input type="text" name="sab_fim" class="wdt-70 inp" value="<?php echo $con_busca['sab_fim']; ?>">
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td width="60">
                                                        <input type="checkbox" name="dom" value="dom" <?php echo ($con_busca['domingo'] == 'dom') ? 'checked' : ''; ?>> dom:
                                                    </td>
                                                    <td width="85">
                                                        <input type="text" name="dom_ini" class="wdt-70 inp" value="<?php echo $con_busca['dom_ini']; ?>">
                                                    </td>
                                                    <td width="45">
                                                        para
                                                    </td>
                                                    <td width="70">
                                                        <input type="text" name="dom_fim" class="wdt-70 inp" value="<?php echo $con_busca['dom_fim']; ?>">
                                                    </td>
                                                </tr>

                                            </table>
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-lg-4 col-xs-12">
                                        <div class="bloco">
                                            <table>
                                                <tr>
                                                    <td width="155" class="direita">Exibição de Grade:</td>
                                                    <td width="128">
                                                        <select class="wdt-125" name="grade">
                                                            <option value="15" <?php echo ($con_busca['exibicao_grade'] == 15) ? 'selected' : ''; ?>>15</option>
                                                            <option value="30" <?php echo ($con_busca['exibicao_grade'] == 30) ? 'selected' : ''; ?>>30</option>
                                                            <option value="45" <?php echo ($con_busca['exibicao_grade'] == 45) ? 'selected' : ''; ?>>45</option>
                                                            <option value="60" <?php echo ($con_busca['exibicao_grade'] == 60) ? 'selected' : ''; ?>>60</option>
                                                        </select>
                                                    </td>
                                                    <td>min</td>
                                                </tr>

                                                <tr>
                                                    <td class="direita">Agendamento Mínimo:</td>
                                                    <td>
                                                        <select class="wdt-125" name="agend_min">
                                                            <option value="15" <?php echo ($con_busca['agend_minimo'] == 15) ? 'selected' : ''; ?>>15</option>
                                                            <option value="30" <?php echo ($con_busca['agend_minimo'] == 30) ? 'selected' : ''; ?>>30</option>
                                                            <option value="45" <?php echo ($con_busca['agend_minimo'] == 45) ? 'selected' : ''; ?>>45</option>
                                                            <option value="60" <?php echo ($con_busca['agend_minimo'] == 60) ? 'selected' : ''; ?>>60</option>
                                                        </select>
                                                    </td>
                                                    <td>min</td>
                                                </tr>

                                                <tr>
                                                    <td class="direita">Agendamento Padrão:</td>
                                                    <td>
                                                        <select class="wdt-125" name="agend_padrao">
                                                            <option value="30" <?php echo ($con_busca['agend_padrao'] == 30) ? 'selected' : ''; ?>>30</option>
                                                            <option value="60" <?php echo ($con_busca['agend_padrao'] == 60) ? 'selected' : ''; ?>>60</option>
                                                        </select>
                                                    </td>
                                                    <td>min</td>
                                                </tr>

                                                <tr>
                                                    <td class="direita">Agendamento Máximo:</td>
                                                    <td>
                                                        <select class="wdt-125" name="agend_max">
                                                            <option value="30" <?php echo ($con_busca['agend_maximo'] == 30) ? 'selected' : ''; ?>>30</option>
                                                            <option value="60" <?php echo ($con_busca['agend_maximo'] == 60) ? 'selected' : ''; ?>>60</option>
                                                            <option value="90" <?php echo ($con_busca['agend_maximo'] == 90) ? 'selected' : ''; ?>>90</option>
                                                            <option value="120" <?php echo ($con_busca['agend_maximo'] == 120) ? 'selected' : ''; ?>>120</option>
                                                        </select>
                                                    </td>
                                                    <td>min</td>
                                                </tr>

                                            </table>

                                            <br><br>

                                            <table>
                                                <tr>
                                                    <td width="120" class="direita">Pausa</td>
                                                    <td width="75"><input type="text" name="pausa" class="inp wdt-70" value="<?php echo $con_busca['pausa']; ?>"></td>
                                                    <td width="53">Retorno </td>
                                                    <td><input type="text" name="retorno" class="inp wdt-70" value="<?php echo $con_busca['retorno']; ?>"></td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                                <div class="ln-tracejada-1"></div>
                                <div class="mg-top-10"></div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <span class="fs fs-14">Aviso mínimo:</span>
                                        <input type="text" class="inp2 wdt-70" id="aviso-minimo" name="aviso_minimo" value="<?php echo $con_busca['aviso_minimo']; ?>">
                                        <select class="wdt-150" name="und_tempo" id="sel-und">
                                            <option value="min" <?php echo ($con_busca['und_tempo'] == 'min') ? 'selected' : ''; ?>>minutos</option>
                                            <option value="hr" <?php echo ($con_busca['und_tempo'] == 'hr') ? 'selected' : ''; ?>>horas</option>
                                        </select> 
                                    </div>
                                </div>

                                <div class="mg-top-10"></div>
                                <div class="ln-tracejada-1"></div>
                                <div class="mg-top-20"></div>
                                <center>
                                    <a href="cad_monitor.php"><input type="button" value="Voltar" class="button"></a>
                                    <input type="button" value="Confirmar Edição" class="button button-orange" onclick="confirmarEdicao();"> 
                                </center>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
            <?php
            include_once './layout/footer.php';
            ?>

        </div>
    </body>
</html>
<script type="text/javascript" src="js/valida_hora.js"></script>
<script type="text/javascript">
$(document).ready(function () {
    $('.inp').mask('99:99');
});

function salvarHorarios() {
    var form = this.form_cad_horario;
    var segunda = form.seg.value;
    alert(segunda);
}

function validaAbaHorarios() {
    var seg = document.formHorario.seg;
    var ter = document.formHorario.ter;
    var qua = document.formHorario.qua;
    var qui = document.formHorario.qui;
    var sex = document.formHorario.sex;
    var sab = document.formHorario.sab;
    var dom = document.formHorario.dom;

    var seg_ini = document.formHorario.seg_ini.value;
    var seg_fim = document.formHorario.seg_fim.value;
    var ter_ini = document.formHorario.ter_ini.value;
    var ter_fim = document.formHorario.ter_fim.value;
    var qua_ini = document.formHorario.qua_ini.value;
    var qua_fim = document.formHorario.qua_fim.value;
    var qui_ini = document.formHorario.qui_ini.value;
    var qui_fim = document.formHorario.qui_fim.value;
    var sex_ini = document.formHorario.sex_ini.value;
    var sex_fim = document.formHorario.sex_fim.value;
    var sab_ini = document.formHorario.sab_ini.value;
    var sab_fim = document.formHorario.sab_fim.value;
    var dom_ini = document.formHorario.dom_ini.value;
    var dom_fim = document.formHorario.dom_fim.value;

    if (seg.checked) {
        if (seg_ini !== "" && seg_fim !== "") {
            var ini = seg_ini.replace(":", "");
            var fim = seg_fim.replace(":", "");
            if (ini.substring(0, 2) > 23 || ini.substring(2, 4) > 59 || fim.substring(0, 2) > 23 || fim.substring(2, 4) > 59) {
                return false;
            }
            if (ini > fim) {
                return false;
            }
        } else {
            return false;
        }
    }
    if (!seg.checked) {
        if (seg_ini !== "" || seg_fim !== "") {
            return false;
        }
    }
    if (ter.checked) {
        if (ter_ini != "" && ter_fim != "") {
            var ini = ter_ini.replace(":", "");
            var fim = ter_fim.replace(":", "");
            if (ini.substring(0, 2) > 23 || ini.substring(2, 4) > 59 || fim.substring(0, 2) > 23 || fim.substring(2, 4) > 59) {
                return false;
            }
            if (ini > fim) {
                return false;
            }
        } else {
            return false;
        }
    }
    if (!ter.checked) {
        if (ter_ini != "" || ter_fim != "") {
            return false;
        }
    }
    if (qua.checked) {
        if (qua_ini != "" && qua_fim != "") {
            var ini = qua_ini.replace(":", "");
            var fim = qua_fim.replace(":", "");
            if (ini.substring(0, 2) > 23 || ini.substring(2, 4) > 59 || fim.substring(0, 2) > 23 || fim.substring(2, 4) > 59) {
                return false;
            }
            if (ini > fim) {
                return false;
            }
        } else {
            return false;
        }
    }
    if (!qua.checked) {
        if (qua_ini != "" || qua_fim != "") {
            return false;
        }
    }
    if (qui.checked) {
        if (qui_ini != "" && qui_fim != "") {
            var ini = qui_ini.replace(":", "");
            var fim = qui_fim.replace(":", "");
            if (ini.substring(0, 2) > 23 || ini.substring(2, 4) > 59 || fim.substring(0, 2) > 23 || fim.substring(2, 4) > 59) {
                return false;
            }
            if (ini > fim) {
                return false;
            }
        } else {
            return false;
        }
    }
    if (!qui.checked) {
        if (qui_ini != "" || qui_fim != "") {
            return false;
        }
    }
    if (sex.checked) {
        if (sex_ini != "" && sex_fim != "") {
            var ini = sex_ini.replace(":", "");
            var fim = sex_fim.replace(":", "");
            if (ini.substring(0, 2) > 23 || ini.substring(2, 4) > 59 || fim.substring(0, 2) > 23 || fim.substring(2, 4) > 59) {
                return false;
            }
            if (ini > fim) {
                return false;
            }
        } else {
            return false;
        }
    }
    if (!sex.checked) {
        if (sex_ini != "" || sex_fim != "") {
            return false;
        }
    }
    if (sab.checked) {
        if (sab_ini != "" && sab_fim != "") {
            var ini = sab_ini.replace(":", "");
            var fim = sab_fim.replace(":", "");
            if (ini.substring(0, 2) > 23 || ini.substring(2, 4) > 59 || fim.substring(0, 2) > 23 || fim.substring(2, 4) > 59) {
                return false;
            }
            if (ini > fim) {
                return false;
            }
        } else {
            return false;
        }
    }
    if (!sab.checked) {
        if (sab_ini != "" || sab_fim != "") {
            return false;
        }
    }
    if (dom.checked) {
        if (dom_ini != "" && dom_fim != "") {
            var ini = dom_ini.replace(":", "");
            var fim = dom_fim.replace(":", "");
            if (ini.substring(0, 2) > 23 || ini.substring(2, 4) > 59 || fim.substring(0, 2) > 23 || fim.substring(2, 4) > 59) {
                return false;
            }
            if (ini > fim) {
                return false;
            }
        } else {
            return false;
        }
    }
    if (!dom.checked) {
        if (dom_ini != "" || dom_fim != "") {
            return false;
        }
    }
    return true;
}

function validarAbaAvancado() {
    var aviso2 = document.getElementById("aviso-minimo").value;
    ;
//        alert(aviso2);
    if (aviso2 !== "") {
        if (aviso2 > 48) {
            return false;
        }
        return true;
    }
    return false;
}
function fecharMsgErro() {
    $('.mensagem').css('display', 'none').css('transition', '1s');
}

function confirmarEdicao() {
    if (validaAbaHorarios()) {
        var dados = $('#form-edicao').serialize();
        $.ajax({
            type: 'POST',
            dataType: 'html',
            url: './php/editar_monitor.php',
            data: dados,
            success: function (msg) {
                if (msg === "ok") {
                    $('.mensagem span').html('Dados do monitor atualizados com sucesso!');
                    $('.mensagem').removeClass('bg-red-60');
                    $('.mensagem').css('display', 'block').css('background-color', '#32BF32');
                } else {
                    $('.mensagem span').html('Erro ao tentar editar os dados do monitor!');
                    $('.mensagem').addClass('bg-red-60');
                    $('.mensagem').css('display', 'block');
                }
            }
        });
    } else {
        $('.mensagem span').html('Impossível confirmar a edição dos dados, por favor cheque os dados fornecidos!');
        $('.mensagem').addClass('bg-red-60');
        $('.mensagem').css('display', 'block');
    }

}
</script>
