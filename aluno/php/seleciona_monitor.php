<?php

session_name('aluno');
session_start();

$_SESSION['monitor_selecionado'] = $_GET['monitor'];
header("Location:../horarios.php");
