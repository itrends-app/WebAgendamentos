<?php

$nome_usuario = strtoupper($_POST['nome_usuario']);
$usuario = $_POST['usuario'];
$senha = md5($_POST['senha']);
$nivel = $_POST['nivel'];

try {
    include_once './conexao.php';

    $stmt = $pdo->prepare("insert into tb_usuarios_adm (usuario, senha, nome_usuario, nivel_acesso) values(:usuario, :senha, :nome_usuario, :nivel)");
    $stmt->bindValue(":usuario", $usuario);
    $stmt->bindValue(":senha", $senha);
    $stmt->bindValue(":nome_usuario", $nome_usuario);
    $stmt->bindValue(":nivel", $nivel);
    $stmt->execute();
    echo "ok";

} catch (PDOException $e) {
    echo "not";
}


