<?php

$email = $_SESSION["email_atual"]; // 

$mensagem = "<h3>Confirmamos o cancelamento da monitoria do dia ".$_SESSION['horario']."</h3>";
$mensagem_full = utf8_decode($mensagem);

$mensagem_tutor = "<h2>Aviso de cancelamento de monitoria: </h2><br><h3>Aluno: ".$_SESSION['nome_aluno']."<br>"
        . "<h3>Agendado para: ".$_SESSION['horario']."<br>"
        . "Motivo: ".$motivo."</h3>";

require_once("../../phpmailer/class.phpmailer.php");

define('GUSER', 'arcs.si3@gmail.com'); // <-- Insira aqui o seu GMail
define('GPWD', '22041996#$');  // <-- Insira aqui a senha do seu GMail

function smtpmailer($para, $de, $de_nome, $assunto, $corpo) {
    //global $error;
    $mail = new PHPMailer();
    $mail->IsSMTP();  // Ativar SMTP
    $mail->SMTPDebug = 0;  // Debugar: 1 = erros e mensagens, 2 = mensagens apenas
    $mail->SMTPAuth = true;  // Autenticação ativada
    $mail->SMTPSecure = 'ssl'; // SSL REQUERIDO pelo GMail
    $mail->Host = 'smtp.gmail.com'; // SMTP utilizado
    $mail->Port = 465;    // A porta 465 deverá estar aberta em seu servidor
    $mail->Username = GUSER;
    $mail->Password = GPWD;
    $mail->SetFrom($de, $de_nome);
    $mail->Subject = $assunto;
    $mail->Body = $corpo;
    $mail->AddAddress($para);
    $mail->ContentType = "text/html";
    if (!$mail->Send()) {
        return false;
    } else {
        return true;
    }
}

if (smtpmailer($email, 'arcs.si3@gmail.com', 'Sistema de Agendamento', 'Cancelamento', $mensagem_full)) {
    echo "email enviado!";
} else {
    echo "erro";
}
if (smtpmailer($_SESSION['email_tutor'], 'arcs.si3@gmail.com', 'Sistema de Agendamento', 'Cancelamento', $mensagem_tutor)) {
//    echo "email enviado!";
} else {
    echo "erro";
}
?>


