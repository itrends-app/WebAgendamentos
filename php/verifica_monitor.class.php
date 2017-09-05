<?php

class VerificaMonitor {

    function __construct() {
        
    }

    function verificaMonitorExistente($id_monitor) {
        try {
            include_once('./conexao.php');
            $stmt = $pdo->prepare("select * from tb_horarios_monitor where monitor_id = :monitor");
            $stmt->bindValue(":monitor", $id_monitor);
            $stmt->execute();
            if ($stmt->rowCount() > 0) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }
}


    