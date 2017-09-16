<?php

$hora_atual;
$dia_atual;
//$socket = fsockopen('udp://pool.ntp.br', 123, $err_no, $err_str, 1);
//if ($socket) {
//    if (fwrite($socket, chr(bindec('00' . sprintf('%03d', decbin(3)) . '011')) . str_repeat(chr(0x0), 39) . pack('N', time()) . pack("N", 0))) {
//        stream_set_timeout($socket, 1);
//        $unpack0 = unpack("N12", fread($socket, 48));
        $hora_atual =  date('H:i');
        $dia_atual = date('Y-m-d');
//    }
//    fclose($socket);
//}
