<?php

include_once './SessaoUsuario.php';

$usuario = $_POST['usuario'];
$senha = md5($_POST['senha']);
$nome_usuario = strtoupper($_POST['nome_usuario']);
$nivel = $_POST['nivel'];
$id = $_SESSION['usuario_selecionado'];

if (isset($_SESSION['usuario_selecionado'])) {
    try {
        include_once('./conexao.php');
        $stmt = null;
        if ($_POST['senha'] == "") {
            $stmt = $pdo->prepare("update tb_usuarios_adm set usuario = :usuario, nome_usuario = :nome_usuario, nivel_acesso = :nivel where id = :id");
        } else {
            $stmt = $pdo->prepare("update tb_usuarios_adm set usuario = :usuario, senha = :senha, nome_usuario = :nome_usuario, nivel_acesso = :nivel where id = :id");
            $stmt->bindValue(":senha", $senha);
        }
        $stmt->bindValue(":usuario", $usuario);
        $stmt->bindValue(":nome_usuario", $nome_usuario);
        $stmt->bindValue(":nivel", $nivel);
        $stmt->bindValue(":id", $id);
        $stmt->execute();
        echo "ok";
    } catch (PDOException $e) {
        echo "not";
    }
} else {
    echo "not";
}