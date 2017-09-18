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

    if (seg.checked && seg_ini != "" && seg_fim != "" || ter.checked && ter_ini != "" && ter_fim != "" || qua.checked && qua_ini != "" &&
            qua_fim != "" || qui.checked && qui_ini != "" && qui_ini != "" || sex.checked && sex_ini != "" && sex_fim != "" || sab.checked &&
            sab_ini != "" && sab_fim != "" || dom.checked && dom_ini != "" && dom_fim != "") {
        if (seg.checked) {
            var ini = seg_ini.replace(":", "");
            var fim = seg_fim.replace(":", "");
            if (ini.substring(0, 2) > 23 || ini.substring(2, 4) > 59 || fim.substring(0, 2) > 23 || fim.substring(2, 4) > 59) {
                return false;
            }
            if (ini > fim) {
                return false;
            }
        }
        if (ter.checked) {
            var ini = ter_ini.replace(":", "");
            var fim = ter_fim.replace(":", "");
            if (ini.substring(0, 2) > 23 || ini.substring(2, 4) > 59 || fim.substring(0, 2) > 23 || fim.substring(2, 4) > 59) {
                return false;
            }
            if (ini > fim) {
                return false;
            }
        }
        if (qua.checked) {
            var ini = qua_ini.replace(":", "");
            var fim = qua_fim.replace(":", "");
            if (ini.substring(0, 2) > 23 || ini.substring(2, 4) > 59 || fim.substring(0, 2) > 23 || fim.substring(2, 4) > 59) {
                return false;
            }
            if (ini > fim) {
                return false;
            }
        }
        if (qui.checked) {
            var ini = qui_ini.replace(":", "");
            var fim = qui_fim.replace(":", "");
            if (ini.substring(0, 2) > 23 || ini.substring(2, 4) > 59 || fim.substring(0, 2) > 23 || fim.substring(2, 4) > 59) {
                return false;
            }
            if (ini > fim) {
                return false;
            }
        }
        if (sex.checked) {
            var ini = sex_ini.replace(":", "");
            var fim = sex_fim.replace(":", "");
            if (ini.substring(0, 2) > 23 || ini.substring(2, 4) > 59 || fim.substring(0, 2) > 23 || fim.substring(2, 4) > 59) {
                return false;
            }
            if (ini > fim) {
                return false;
            }
        }
        if (sab.checked) {
            var ini = sab_ini.replace(":", "");
            var fim = sab_fim.replace(":", "");
            if (ini.substring(0, 2) > 23 || ini.substring(2, 4) > 59 || fim.substring(0, 2) > 23 || fim.substring(2, 4) > 59) {
                return false;
            }
            if (ini > fim) {
                return false;
            }
        }
        if (dom.checked) {
            var ini = dom_ini.replace(":", "");
            var fim = dom_fim.replace(":", "");
            if (ini.substring(0, 2) > 23 || ini.substring(2, 4) > 59 || fim.substring(0, 2) > 23 || fim.substring(2, 4) > 59) {
                return false;
            }
            if (ini > fim) {
                return false;
            }
        }

    }
    return true;
}


