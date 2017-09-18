<?php

//$user = "root";
//$server = "localhost";
//$banco = "gs";
//$senha = "mastersql";
//
//$mysqli = new mysqli($server, $user, $senha, $banco);
//
//if ($mysqli->connect_errno) {
//    echo "Falha ao conectar: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
//}
//
$pdo = new PDO("mysql:host=localhost; dbname=sis_agenda", "root", "");
