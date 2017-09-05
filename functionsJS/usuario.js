function logar() {
    $.ajax({
        type: 'POST',
        dataType: 'html',
        url: './php/Logar.php',
        data: {
            user: document.getElementById('form-login').user.value,
            senha: document.getElementById('form-login').senha.value
        },
        success: function (msg) {
            if (msg === "ok") {
                location.href = 'home.php';
            } else {
                $('.alert').removeClass('ocultar');
                document.getElementById('form-login').senha.value = "";
            }
        }
    });
}

//executa método logar ao pressionar enter no campo senha
$('#form-senha').keypress(function (e) {
    var tecla = (e.keyCode ? e.keyCode : e.which);
    if (tecla === 13) {
        logar();
    }
});


function cadastrarUsuario() {
    var dados = $('#form-usuario').serialize();
    if (validaCampos()) {
        $.ajax({
            type: 'post',
            dataType: 'html',
            url: './php/CadastrarUsuario.php',
            data: dados,
            success: function (msg) {
                if (msg === "ok") {
                    $('.mensagem span').html('Usuário cadastrado com sucesso!');
                    $('.mensagem').css('display', 'block').css('background-color', '#32BF32').removeClass('bg-red-60');
                    limpaCampos();
                } else {
                    $('.mensagem span').html('Erro ao tentar cadastrar o usuário!');
                    $('.mensagem').css('display', 'block').addClass('bg-red-60');
                }
            }
        });
    } else {
        $('.mensagem span').html('Preencha todos os campos!');
        $('.mensagem').css('display', 'block').addClass('bg-red-60');
    }
}
function validaCampos() {
    var nome_usuario = this.form_usuario.nome_usuario.value;
    var usuario = this.form_usuario.usuario.value;
    var senha = this.form_usuario.senha.value;
    var nivel = this.form_usuario.nivel.value;
    if (nome_usuario === "" || usuario === "" || senha === "" || nivel === "" || nivel == 0) {
        return false;
    }
    return true;
}
function fecharMsgErro() {
    $('.mensagem').css('display', 'none').css('transition', '1s');
}
function limpaCampos() {
    $('#form-usuario').each(function () {
        this.reset();
    });
}
function mostrarSenha() {
    var mst = this.form_usuario.mostrar_senha;
    if (mst.checked) {
        this.form_usuario.senha.type = 'text';
    } else {
        this.form_usuario.senha.type = 'password';
    }
}

function editarUsuario() {
    var dados = $('#form').serialize();
    $.ajax({
        type: 'post',
        dataType: 'html',
        url: "./php/EditarPerfil.php",
        data: dados,
        success: function (msg) {
            if (msg === "ok") {
                $('.mensagem span').html('Perfil alterado com sucesso!');
                $('.mensagem').css('display', 'block').css('background-color', '#32BF32');
            } else {
                $('.mensagem span').html('Erro ao tentar editar as informações do usuário!');
                $('.mensagem').css('display', 'block').addClass('bg-red-60');
            }
        }
    });
}
function mostrarSenha() {
    var mst = this.form_editar_perfil.mostrar_senha;
    if (mst.checked) {
        this.form_editar_perfil.senha.type = 'text';
    } else {
        this.form_editar_perfil.senha.type = 'password';
    }
}
function irParaPagina(url) {
    location.href = url;
}
function fecharMsgErro() {
    $('.mensagem').css('display', 'none').css('transition', '1s');
}

function pesquisar() {
    $('#usr-table').empty();
    var busca = this.form_consulta_usuario.pesquisa.value;
    $.ajax({
        type: 'post',
        dataType: 'json',
        url: './php/ConsultaUsuarios.php',
        data: {
            usr: busca
        },
        success: function (dados) {
            if (dados === "not") {
                $('#usr-table').append('<tr><td colspan="4">Nenhum usuário encontrado!</td></tr>');
            } else {
                for (var i = 0; i < dados.length; i++) {
                    if (dados[i].nivel_acesso == 1) {
                        $('#usr-table').append('<tr><td>' + dados[i].usuario + '</td><td>' + dados[i].nome_usuario + '</td>\n\
                            <td>Administrador</td><td style="text-align:center;"><a href="#" onclick="iniciarEdicao(' + dados[i].id + ');"><i class="fa fa-cog c-black"></i></a>\n\
                            <a href="#" onclick="abrirDialogo(' + dados[i].id + ');"><i class="fa fa-trash c-red"></i></a></td></tr>');
                    }
                    if (dados[i].nivel_acesso == 2) {
                        $('#usr-table').append('<tr><td>' + dados[i].usuario + '</td><td>' + dados[i].nome_usuario + '</td>\n\
                            <td>Gerente</td><td style="text-align:center;"><a href="#" onclick="iniciarEdicao(' + dados[i].id + ');"><i class="fa fa-cog c-black"></i></a>\n\
                            <a href="#" onclick="abrirDialogo(' + dados[i].id + ');"><i class="fa fa-trash c-red"></i></a></td></tr>');
                    }
                }
            }
        }
    });
}
function fecharMsgErro() {
    $('.mensagem').css('display', 'none').css('transition', '1s');
}
function fecharDialogo() {
    $('#dialogo-confirmacao').css('display', 'none');
}
function abrirDialogo(id_user) {
    user_id = id_user;
    $('#dialogo-confirmacao').css('display', 'block');
    $('.confirm').css('opacity', '1').css('margin', '20px auto').css('transition', '3s');
}
function excluirUsuario() {
    $.ajax({
        type: 'post',
        dataType: 'html',
        url: './php/ExcluirUsuario.php',
        data: {
            id: user_id
        },
        success: function (msg) {
            if (msg === "ok") {
                fecharDialogo();
                pesquisar();
                $('.mensagem span').html('Usuário excluído com sucesso!');
                $('.mensagem').css('display', 'block').css('background-color', '#32BF32');
            }
        }
    });
}

function iniciarEdicao(usuario_id) {
    $.ajax({
        type: 'post',
        dataType: 'html',
        url: './php/ArmazenaIdUsuario.php',
        data: {
            usuario: usuario_id
        },
        success: function (msg) {
            location.href = 'editar_usuario.php';
        }
    });
}