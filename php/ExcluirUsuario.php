<?php

try {
    include_once('./conexao.php');
    
    $stmt = $pdo->prepare("delete from tb_usuarios_adm where id = :id");
    $stmt->bindValue(":id", $_POST['id']);
    $stmt->execute();
    if ($stmt) {
        echo "ok";
    } else {
        echo "not";
    }
} catch (PDOException $e) {
    echo $e->getMessage();
}
