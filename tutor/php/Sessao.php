<?php

session_name('tutor');
session_start();
if(!isset($_SESSION['tutor_id'])) {
    header("location:http://ava.fcrs.edu.br/portal3/");
}

