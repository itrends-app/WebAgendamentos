<?php
$curso = $_POST['curso'];
try {
    include_once('./conexao.php');
    $stmt = $pdo->prepare("select * from tb_horarios_monitor hr, vw_usuarios us where us.id = hr.monitor_id and hr.curso_id = :curso");
    $stmt->bindValue(":curso", $curso);
    $stmt->execute();
    while($linha = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $vetor[] = array_map('utf8_encode', $linha);
    }
    echo json_encode($vetor);
} catch (PDOException $ex) {
    echo $ex->getMessage();
}