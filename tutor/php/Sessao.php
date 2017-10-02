<?php

session_name('tutor');
session_start();
date_default_timezone_set('America/Fortaleza');

if(!isset($_SESSION['tutor_id'])) {
    header("location:http://ava.fcrs.edu.br/portal3/");
}

