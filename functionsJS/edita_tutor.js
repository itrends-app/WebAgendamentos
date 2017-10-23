$(document).ready(function () {
    $('.mask').mask('99:99');
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
                    $('.alert-msg').html('Dados do monitor atualizados com sucesso!');
                    $('.alert').removeClass('alert-danger').addClass('alert-success').fadeIn(500);
                } else {
                    $('.alert-msg').html('Erro ao tentar editar os dados do monitor!');
                    $('.alert').addClass('alert-danger').removeClass('alert-success').fadeIn(500);
                }
            }
        });
    } else {
        $('.mensagem span').html('Impossível confirmar a edição dos dados, por favor cheque os dados fornecidos!');
        $('.mensagem').addClass('bg-red-60');
        $('.mensagem').css('display', 'block');
    }

}