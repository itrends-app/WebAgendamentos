<?php

ob_start();
include('./confirmacao_email.html');
$conteudo = ob_get_contents();
ob_end_clean();

mail("arcs.si3@gmail.com", "Teste", $conteudo, "Content-type: text/html\r\n");

