function escolheCurso(categoria) {
    $("#sel-curso").empty();
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
}


