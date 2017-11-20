<?php

//retorna os dados do aluno
$st1 = $pdo->prepare("select us.email, us.firstname, a.* from tb_agendamentos a, vw_usuarios us where us.id = a.aluno_id and a.id = :id_agendamento");
$st1->bindValue(":id_agendamento", $_SESSION['agendamento_id']);
$st1->execute();
$conn_aluno = $st1->fetch(PDO::FETCH_ASSOC);

//retorna dados do monitor
$st2 = $pdo->prepare("select us.email, a.* from tb_agendamentos a, vw_usuarios us where us.id = a.monitor_id and a.id = :agend_id");
$st2->bindValue(":agend_id", $_SESSION['agendamento_id']);
$st2->execute();
$conn_monitor = $st2->fetch(PDO::FETCH_ASSOC);

//Mensagem que o sistema irá enviar para o aluno da disciplina
$mensagem = "<h3>Olá, você confirmou o reagendamento de sua presença no encontro de monitoria. <br>Categoria: " . utf8_encode($_SESSION['nome_categoria']) . ""
        . "<br>Curso: " . $_SESSION['disciplina'] . "<br>Monitor: " . $_SESSION['monitor_selecionado2'] . "<br>Agendado para: " . $_SESSION['dia_marcado'] . " de "
        . "" . $_SESSION['mes_marcado'] . " de " . $_SESSION['ano_marcado'] . " " . $_SESSION['hora_marcada'] . "<br><br><br>"
        . "<a href='neadteste.fcrs.edu.br/neadmon/aluno/php/pega_dados_via_email.php?id=".$_SESSION['agendamento_id']."&email=".$conn_aluno['email']."'>Clique aqui para cancelar o agendamento</a><br>"
        . "<a href='neadteste.fcrs.edu.br/neadmon/aluno/const.php'>Clique aqui para editar o agendamento</a></h3>";
$mensagem_full = utf8_decode($mensagem);

//Mensagem que o sistema irá enviar para o tutor da disciplina
$mensagem_monitor = "<h2>Reagendamento</h2>"
        . "<h3>Aluno: " . $conn_aluno['firstname'] . "<br>"
        . "Curso: ".$_SESSION['disciplina']."<br>"
        . "Agendado para: ".$conn_aluno['horario']."<br>"
        . "Reagendado para: " . $_SESSION['dia_marcado'] . " de "
        . "" . utf8_decode($_SESSION['mes_marcado']) . " de " . $_SESSION['ano_marcado'] . " " . $_SESSION['hora_marcada']."</h3>";

require_once("../phpmailer/class.phpmailer.php");

define('GUSER', 'arcs.si3@gmail.com'); //email responsável por enviar os emails para os alunos e tutores
define('GPWD', '22041996#$'); // senha do email

//método que envia os emails
function smtpmailer($para, $de, $de_nome, $assunto, $corpo) {
    global $error;
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
        $error = 'Mail error: ' . $mail->ErrorInfo;
        return false;
    } else {
        $error = 'Mensagem enviada!';
        return true;
    }
}

//envia email para o aluno
if (smtpmailer('lucasalison96@gmail.com', 'arcs.si3@gmail.com', 'Sistema de Agendamento Unicatólica', 'Reagendamento', $mensagem_full)) {
    
}

//envia email para o monitor
if (smtpmailer('arcs.si3@gmail.com', 'arcs.si3@gmail.com', 'Sistema de Agendamento Unicatólica', 'Reagendamento', $mensagem_monitor)) {
    
}


