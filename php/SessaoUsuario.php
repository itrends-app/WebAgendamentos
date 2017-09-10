<?php

session_start();
if(!isset($_SESSION['id_usuario_logado'])) {
    header("location:index.php");
}

