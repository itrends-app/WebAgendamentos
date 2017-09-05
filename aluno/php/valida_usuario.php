<?php
session_name('aluno');
session_start();
if(!isset($_SESSION['aluno'])) {
    session_destroy();
    header("Location:http://ava.fcrs.edu.br/portal3/");
}
