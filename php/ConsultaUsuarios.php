<?php

$busca = $_POST['usr'];
try {
    include_once('./conexao.php');
    $stmt = $pdo->prepare("select * from tb_usuarios_adm where usuario like :busca");
    $stmt->bindValue(":busca", $busca."%");
    $stmt->execute();
    
    if($stmt->rowCount() > 0) {
    while($linha = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $vetor[] = array_map('utf8_encode', $linha);
    }
    echo json_encode($vetor);
    } else {
        echo json_encode("not");
    }
} catch (PDOException $exc) {
    echo "erro";
}