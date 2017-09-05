$(document).ready(function () {
    $(".fechar-dialog").click(function () {
        $(".fundo-opaco").css("display", "none");
        location.href = "cadastrotutor.php";
    });

    //seleciona o tutor
    $("#sel-curso").change(function () {
        var id_curso = $("#sel-curso option:selected").val();
        document.getElementById("id-curso").value = id_curso;
        $("#tabela").empty();
        $.ajax({
            type: 'post',
            dataType: 'json',
            url: './php/select_monitores.php',
            data: {
                curso: id_curso
            },
            success: function (dados) {
                if (screen.width < 720) {
                    $('#campos-tabela').html('<tr><th>Nome Completo</th><th>Ações</th></tr>');
                } else {
                    $('#campos-tabela').html('<tr><th>Matrícula</th><th>Nome Completo</th><th>Email</th><th>Ações</th></tr>');
                }

                for (var i = 0; dados.length > i; i++) {
                    if (screen.width >= 720) {
                        $('#tabela').append('<tr><td>' + dados[i].username + '</td><td>' + dados[i].firstname + '</td><td>' + dados[i].email +
                                '</td><td style="text-align:center"><a onclick="selecionar(' + dados[i].id + ');" href="#"><i class="fa fa-hand-pointer-o c-gray-50" title="Selecionar"></i></a> \n\
                            <a onclick="editar(' + dados[i].id + ');" href="#"><i class="fa fa-gear c-gray-50" title="Editar"></i></a> \n\
                            <a onclick="abrirDialogo(' + dados[i].id + ');" href="#"><i class="fa fa-trash c-red" title="Excluir"></i></a></td></tr>');
                    } else {
                        $('#tabela').append('<tr><td>' + dados[i].firstname + '</td><td style="text-align:center"><a onclick=selecionar(' + dados[i].id + '); href="#"><i class="fa fa-hand-pointer-o c-gray-50" title="Selecionar"></i></a> \n\
                            <a onclick="editar(' + dados[i].id + ');" href="#"><i class="fa fa-gear c-gray-50" title="Editar"></i></a> \n\
                            <a onclick="abrirDialogo(' + dados[i].id + ');" href="#"><i class="fa fa-trash c-red" title="Excluir"></i></a></td></tr>');
                    }

                }
                footer();
            }
        });
    });
});

function selecionaAba(classe) {
    if (validarAbaMonitor() === true) {
        if (classe == ".guia1 a") {
            $("#aba-horario, #aba-avancado, #aba-agendado").css("display", "none");
            $("#cad-monitor").css("display", "inline");
        } else if (classe == ".guia2 a") {
            if (aba_horario === 1) {
                $("#cad-monitor, #aba-avancado, #aba-agendado").css("display", "none");
                $("#aba-horario").css("display", "inline");
            }
        } else if (classe == ".guia3 a") {
            if (aba_avancado === 1) {
                $("#aba-horario, #cad-monitor, #aba-agendado").css("display", "none");
                $("#aba-avancado").css("display", "inline");
            }
        } else if (classe == ".guia4 a") {
            if (aba_agendado === 1) {
                $("#cad-monitor, #aba-horario, #aba-avancado").css("display", "none");
                $("#aba-agendado").css("display", "inline");
            }
        }
        $(".aba-guia a").removeClass('active');
        $(classe).addClass('active');
    }
}

function mudaAba(obj) {
    var titulo = obj.title;
    if (titulo == "tutor") {
        $('#cad-monitor').fadeIn(500);
        $('#aba-horario, #aba-avancado, #aba-agendado').fadeOut(0);
        pintaAbas(obj);
    } else if (titulo == "horario") {
        if (validarAbaMonitor()) {
            $('#aba-horario').fadeIn(500);
            $('#cad-monitor, #aba-avancado, #aba-agendado').fadeOut(0);
            pintaAbas(obj);
        }
    } else if (titulo == "avancado") {
        if (validarAbaMonitor() && validaAbaHorarios()) {
            $('#aba-avancado').fadeIn(500);
            $('#cad-monitor, #aba-horario, #aba-agendado').fadeOut(0);
            pintaAbas(obj);
        }
    } else if (titulo == "confirm") {
        if (validarAbaMonitor() && validaAbaHorarios() && validarAbaAvancado()) {
            $('#aba-agendado').fadeIn(500);
            $('#cad-monitor, #aba-horario, #aba-avancado').fadeOut(0);
        }
    }
    footer();
}

function pintaAbas(obj) {
    $('.abas li').removeClass('active');
    $(obj).parent().addClass('active');
}

function abrirDialogo(id_monitor) {
    monitor_selecionado = id_monitor;
    $('#dialogo-confirmacao').css('display', 'block').css('transition', '1s');
}
function fecharDialogo() {
    $('#dialogo-confirmacao').css('display', 'none').css('transition', '1s');
}

function excluirHorario() {
    $.ajax({
        type: 'post',
        dataType: 'html',
        url: './php/ExcluirHorarioMonitor.php',
        data: {
            monitor: monitor_selecionado
        },
        success: function (msg) {
            if (msg === "ok") {
                fecharDialogo();
                $('#tabela').empty();
            } else if (msg === "not") {
                fecharDialogo();

            } else {
                fecharDialogo();
                $('.mensagem span').html('Impossível excluir o horário do monitor. Monitor já possui agendamentos vinculados a ele!');
                $('.mensagem').css('display', 'block').css('transition', '1s').addClass('bg-red-60');
            }

//            if($('.alert').hasClass('alert-danger')) {
//                $('.alert').removeClass('alert-danger').addClass('alert-success');
//            } else {
//                $('.alert').removeClass('alert-success').addClass('alert-danger');
//            }d
        }
    });
}


var aba_horario = 0;
$(document).ready(function () {
    if (screen.width < 720) {
        $('#campos-tabela').append('<tr><th>Nome Completo</th><th>Ações</th></tr>');
    } else {
        $('#campos-tabela').append('<tr><th>Matrícula</th><th>Nome Completo</th><th>Email</th><th>Ações</th></tr>');
    }

    $("#sel-categoria").change(function () {
        $("#sel-curso").empty();
        var categoria = $("#sel-categoria option:selected").val();
        $.ajax({
            type: 'post',
            dataType: 'html',
            url: './php/select_cursos.php',
            data: {
                cat: categoria
            },
            success: function (dados) {
                $("#sel-curso").append('<option value="">Selecione um</option>' + dados);
            }
        });
    });

});

function selecionar(id_monitor) {
    document.getElementById("id-monitor").value = id_monitor;
    if (validarAbaMonitor() === true) {
        aba_horario = 1;
        var dados = $("#form-monitor").serialize();
        $.ajax({
            type: 'post',
            dataType: 'html',
            url: './php/ArmazenaDadosMonitor.php',
            data: dados,
            success: function (dados) {
                if (dados === "ok") {
                    passaAba();
                } else {
                    $('.alert').fadeIn(300).addClass('alert-danger');
                    $('.alert .alert-msg').html("Tutor já foi cadastrado!")
                    document.getElementById("id-monitor").value = "0";
                }
            }
        });
    }
}

function passaAba() {
    $(".alert").fadeOut(0);
    $("#cad-monitor, #aba-avancado, #aba-agendado").fadeOut(0);
    $("#aba-horario").fadeIn(500);
    $('.abas li').removeClass('active');
    var cont = 0;
    $('.abas').children().each(function () {
        cont++;
        if (cont == 2) {
            $(this).addClass('active');
        }
    });
}
function validarAbaMonitor() {
    var a = document.getElementById("id-monitor").value;
    if (a == "" || a == 0) {
        $('.alert').addClass('alert-danger').fadeIn(500);
        $('.alert .alert-msg').html("Por favor, selecione um tutor para prosseguir!");
        return false;
    } else {
        return true;
    }
}
function editar(id_monitor) {
    alert(id_monitor);
    $.ajax({
        type: 'POST',
        dataType: 'html',
        url: './php/abre_sessao_edicao.php',
        data: {
            monitor: id_monitor
        },
        success: function (dados) {
            if (dados === "ok") {
                location.href = 'edita_dados_monitor.php';
            } else {
                $('.alert').fadeIn(300).addClass('alert-danger');
                $('.alert .alert-msg').html("Impossível prosseguir, tutor não possui cadastro!");
            }
        }
    });
}

function fecharMsgErro() {
    $('.mensagem').css('display', 'none').css('transition', '1s');
}
$(document).ready(function () {
    $(".btn-confirmar").click(function () {
        $.ajax({
            type: 'post',
            dataType: 'html',
            url: './php/cad_horario_monitor.php',
            success: function (dados) {
                $(".mensagem span").html("Cadastro finalizado com sucesso!");
                $(".mensagem").css("display", "block").css('background-color', '#32BF32').removeClass('bg-red-60');
                $(".btn-novo").css("display", "block");
                $(".btn-confirmar").css("display", "none");
            }
        });
    });

    $(".btn-novo").click(function () {
        location.href = "cadastrotutor.php";
    });
});

var aba_agendado = 0;

$(document).ready(function () {

    $("#fnc-avancado").click(function () {
        var aviso = document.getElementById("aviso-minimo").value;
        var und = document.getElementById("sel-und").value;
        var limite_agend = document.getElementById('limite').value;
        if (validarAbaAvancado() === true) {
            passaAba3();
            aba_agendado = 1;
            $.ajax({
                type: 'post',
                dataType: 'html',
                url: './php/armazena_avancado.php',
                data: {
                    und_tempo: und,
                    aviso_minimo: aviso,
                    limite: limite_agend
                },
                success: function (dados) {
                    $('.alert').fadeOut(0);
                    $('#aba-agendado .alert').addClass('alert-success').fadeIn(500);
                    $("#aba-agendado .alert .alert-msg").html(dados);
                }
            });
        } else {
            $('.alert').addClass('alert-danger').fadeIn(500);
            $('.alert .alert-msg').html('Impossível prosseguir, por favor verifique os dados fornecidos!');
        }
    });
});

function passaAba3() {
//    $(".alert").fadeOut(0);
    $("#cad-monitor, #aba-horario, #aba-avancado").fadeOut(0);
    $("#aba-agendado").fadeIn(500);
    $('.abas li').removeClass('active');
    var cont = 0;
    $('.abas').children().each(function () {
        cont++;
        if (cont == 4) {
            $(this).addClass('active');
        }
    });
}

function validarAbaAvancado() {
    var aviso2 = document.getElementById("aviso-minimo").value;
//        alert(aviso2);
    if (aviso2 !== "") {
        if (aviso2 > 48) {
            return false;
        }
        return true;
    }
    return false;
}

var aba_avancado = 0;
$(document).ready(function () {

    $("#salvar-horario").click(function () {
        if (validaAbaHorarios() === true) {
            aba_avancado = 1;
            passaAba2();
            var dados = $("#form-horario").serialize();

            $.ajax({
                type: 'post',
                dataType: 'json',
                url: './php/armazena_horarios.php',
                data: dados,
                success: function (dados) {

                }
            });
        } else {
            alert("Dados inválidos, por favor verifique e tente novamente!");
        }
    });
});

function salvarHorarios() {
    var form = this.form_cad_horario;
    var segunda = form.seg.value;
    alert(segunda);
}

function passaAba2() {
    $(".alert").fadeOut(0);
    $("#aba-horario, #cad-monitor, #aba-agendado").fadeOut(0);
    $("#aba-avancado").fadeIn(500);
    $('.abas li').removeClass('active');
    var cont = 0;
    $('.abas').children().each(function () {
        cont++;
        if (cont == 3) {
            $(this).addClass('active');
        }
    });
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
    return true;
}