<?php
$instanceid = $_POST['curso'];
try {
    include_once('./conexao.php');
    $stmt = $pdo->prepare("SELECT u.id, u.username, u.firstname, u.email FROM vw_atribuicoes rs INNER JOIN vw_usuarios u ON u.id = rs.userid 
       INNER JOIN vw_contexto e ON rs.contextid=e.id WHERE e.contextlevel=50 AND (rs.roleid != 5) AND e.instanceid = :id ORDER BY u.firstname");
    $stmt->bindValue(":id", $instanceid);
    $stmt->execute();
    while($linha = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $vetor[] = array_map('utf8_encode', $linha); 
    }
    echo json_encode($vetor);
} catch (Exception $ex) {
    
}