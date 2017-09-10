<?php

session_name('aluno');
session_start();
session_destroy();
header("location:http://ava.fcrs.edu.br/portal3/");
