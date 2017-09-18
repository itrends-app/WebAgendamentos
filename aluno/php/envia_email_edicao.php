<?php

//pega os dados referentes ao aluno
$stmt = $pdo->prepare("select us.firstname from tb_agendamentos ag, vw_usuarios us where us.id = ag.aluno_id and ag.id = :agendamento");
$stmt->bindValue(":agendamento", $_SESSION['id_agendamento']);
$stmt->execute();
$aluno = $stmt->fetch(PDO::FETCH_ASSOC);

//pega os dados do tutor
$stmt2 = $pdo->prepare("select us.email from tb_agendamentos ag, vw_usuarios us where us.id = ag.monitor_id and ag.id = :agendamento");
$stmt2->bindValue(":agendamento", $_SESSION['id_agendamento']);
$stmt2->execute();
$tutor = $stmt2->fetch(PDO::FETCH_ASSOC);

$email = $_SESSION["email_atual"]; // 
$mensagem = "<h3>Confirmamos o reagendamento da monitoria para o dia ".$_SESSION['dia_marcado']." de ".$_SESSION['mes_marcado']." de "
        . $_SESSION['ano_marcado']." as ".$_SESSION['hora_marcada']. "<br>Curso: ".$_SESSION['disciplina']."</h3>";
$mensagem_full = utf8_decode($mensagem);

$mensagem_tutor = "<h2>Aviso de reagendamento de monitoria: </h2><h3>Aluno: ".$aluno['firstname']."<br>"
        . "Agendado para: ".$_SESSION['dia_marcado']." de ".$_SESSION['mes_marcado']." de "
        . $_SESSION['ano_marcado']." ".$_SESSION['hora_marcada']."<br>"
        . "Motivo: ".$_POST['motivo']."</h3>";

require_once "../../phpmailer/class.phpmailer.php";

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
$nome_app = include_once '../layout/AplicationName.php';
if (smtpmailer($email, 'arcs.si3@gmail.com', $nome_app, 'Aviso de Reagendamento', $mensagem_full)) {
    
} 
if (smtpmailer($tutor['email'], 'arcs.si3@gmail.com', $nome_app, 'Reagendamento', $mensagem_tutor)) {
    
} 



