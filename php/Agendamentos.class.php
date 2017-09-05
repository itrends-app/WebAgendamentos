<?php

class Agendamentos {
    
    function __construct() {
        
    }
    
    function getAgendamentosMes($data_inicial, $data_final) {
        include_once('./php/conexao.php'); 
        $sql = "select count(id) as num from tb_agendamentos where str_to_date(data, '%Y-%m-%d') between str_to_date('$data_inicial', '%Y-%m-%d') and str_to_date('$data_final', '%Y-%m-%d')";
        $result = mysqli_query($mysqli, $sql);
        $rs = mysqli_fetch_array($result);
        echo intval($rs['num']);
    }
    
    function getNomeCurso($id_curso) {
        $sql = "select fullname from vw_cursos where id_course = $id_curso";
        $result = mysqli_query($mysqli, $sql);
        $rs = mysqli_fetch_array($result);
        return $rs['fullname'];
    }
}
