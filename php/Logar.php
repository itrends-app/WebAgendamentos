<?php

session_start();
$usuario = $_POST['user'];
$senha = md5($_POST['senha']);

try {
    include_once('./conexao.php');
    $stmt = $pdo->prepare("select * from tb_usuarios_adm where usuario = :usuario and senha = :senha");
    $stmt->bindValue(":usuario", $usuario);
    $stmt->bindValue(":senha", $senha);
    $stmt->execute();
    $conn = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($stmt->rowCount() > 0) {
        $_SESSION['id_usuario_logado'] = $conn['id'];
        $_SESSION['nome_usuario'] = $conn['nome_usuario'];
        $_SESSION['nivel_acesso'] = $conn['nivel_acesso'];
        echo "ok";
    } else {
        echo "not";
    }
} catch (PDOException $ex) {
    echo "not";
}