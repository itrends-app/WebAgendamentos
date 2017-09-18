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

