function selecionarMonitor(monitor) {
    location.href = "./php/seleciona_monitor.php?monitor=" + monitor;
}
function listaMonitores(id) {
    $('.monitores').empty();
    $.ajax({
        type: 'post',
        dataType: 'json',
        url: './php/ListaMonitores.php',
        data: {curso: id},
        success: function (dados) {
            if (dados === "not") {

            } else {
                for (var i = 0; i < dados.length; i++) {
                    $('.monitores').append('<div class="monitor"><a href="#" onclick="selecionarMonitor(' + dados[i].monitor_id + ');">' + dados[i].firstname + '</a></div>');
                }
            }
        }
    });
}

$(document).ready(function () {
    $('.grade2').fadeOut(0);
    $('.proximo').click(function () {
        var cont = 2;
        if (cont === 2) {
            $('.grade1').css("display", "none");
            $('.grade2').css("display", "block");
        }
    });

    $('.anterior').click(function () {
        var cont = 1;
        if (cont === 1) {
            $('.grade2').css("display", "none");
            $('.grade1').css("display", "block");
        }
    });

    $('.cad_horario').click(function () {
        var str = $(this).text();
        document.form_horarios.hora_marcada.value = str.replace(/\s/g, '');

        var dados = $("#form-horario").serialize();
        $.ajax({
            type: 'post',
            dataType: 'html',
            url: './php/armazena_dados.php',
            data: dados,
            success: function (dados) {
                if (dados === "ok") {
                    window.location.href = "confirmaragendamento.php";
                } else {
                    $('.alert').addClass('alert-danger').fadeIn(500);
                    $('.alert .alert-msg').html('Não há mais vagas disponíveis neste horário, por favor selecione um novo horário!');
                }
            }
        });
    });
});
function buscarAgendamentosTutor() {
    var data_ini = this.agenda.data_inicial.value;
    var data_fim = this.agenda.data_final.value;
    if (data_ini === "" || data_fim === "") {
        $('.alert').addClass('alert-danger').fadeIn(500);
        $('.alert .alert-msg').html("Por favor, preencha a data inicial e a data final!");
    } else {
        $('.alert').fadeOut(0);
        $('#dados-agenda').empty();
        $.ajax({
            type: 'post',
            dataType: 'json',
            url: './php/BuscarAgendamentos.php',
            data: {
                data_inicial: data_ini,
                data_final: data_fim
            },
            success: function (dados) {
                if (dados == 'null') {
                    $('#dados-agenda').append('<tr><td colspan="4">Nenhum agendamento encontrado!</td></tr>');
                } else {
                    for (var i = 0; i < dados.length; i++) {
                        $('#dados-agenda').append('<tr><td>' + dados[i].username + '</td><td>' + dados[i].firstname + '</td>\n\
                                <td>' + formataData(dados[i].data) + '</td><td>' + dados[i].hora + '</td></tr>');
                    }
                }
                footer();
            }
        });
    }
}
function formataData(data) {
    var dia = data.substring(8, 10);
    var mes = data.substring(5, 7);
    var ano = data.substring(0, 4);
    return dia + "/" + mes + "/" + ano;
}
function sleep(milliseconds) {
    var start = new Date().getTime();
    for (var i = 0; i < 1e7; i++) {
        if ((new Date().getTime() - start) >= milliseconds) {
            break;
        }
    }
}
