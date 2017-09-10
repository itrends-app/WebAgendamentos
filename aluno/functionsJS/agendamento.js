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