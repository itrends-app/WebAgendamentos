<?php

//retorna os dados do aluno
$stmt1 = $pdo->prepare("select us.email, us.firstname, a.* from tb_agendamentos a, vw_usuarios us where us.id = a.aluno_id and a.id = :agend_id");
$stmt1->bindValue(":agend_id", $_SESSION['agendamento_id']);
$stmt1->execute();
$conn_aluno = $stmt1->fetch(PDO::FETCH_ASSOC);

//retorna dados do monitor
$stmt2 = $pdo->prepare("select us.email, us.firstname, a.* from tb_agendamentos a, vw_usuarios us where us.id = a.monitor_id and a.id = :agend_id");
$stmt2->bindValue(":agend_id", $_SESSION['agendamento_id']);
$stmt2->execute();
$conn_monitor = $stmt2->fetch(PDO::FETCH_ASSOC);

//retorna dados da disciplina e do curso
$stmt3 = $pdo->prepare("select * from tb_horarios_monitor hm, vw_categorias cat, vw_cursos cur where hm.curso_id = cur.id_course and cur.category = cat.id_category and hm.monitor_id = :monitor");
$stmt3->bindValue(":monitor", $_SESSION['tutor_id']);
$stmt3->execute();
$conn_dados = $stmt3->fetch(PDO::FETCH_ASSOC);

//Mensagem que o sistema irá enviar para o aluno da disciplina
$mensagem = "<h3>Olá, eu " . $conn_monitor['firstname'] . " comunico que o encontro de monitoria agendado para o dia " . date('d/m/Y', strtotime($data_antiga)) . " as " . $hora_antiga . " foi reagendado para o dia " . date('d/m/Y', strtotime($nova_data)) . " as " . $_POST['hora'] . "<br>Categoria: " . utf8_encode($conn_dados['name']) . ""
        . "<br>Curso: " . $conn_dados['fullname'] . "<br>Monitor: " . $conn_monitor['firstname'] . "<br>Motivo: " . $_POST['motivo'];
$mensagem_full = utf8_decode($mensagem);

//Mensagem que o sistema irá enviar para o tutor da disciplina
$mensagem_monitor = "<h2>Alteração de Agendamentos</h2>"
        . "<h3>Curso: " . $conn_dados['fullname'] . "<br>"
        . "Agendamento anterior: " . date('d/m/Y', strtotime($data_antiga)) . " as " . $hora_antiga . "<br>"
        . "Novo Agendamento: " . date('d/m/Y', strtotime($nova_data)) . " as " . $_POST['hora'];

require_once("../../phpmailer/class.phpmailer.php");

define('GUSER', 'arcs.si3@gmail.com'); //email responsável por enviar os emails para os alunos e tutores
define('GPWD', '22041996#$'); // senha do email
//método que envia os emails

function smtpmailer($para, $de, $de_nome, $assunto, $corpo) {
    global $error;
    $mail = new PHPMailer();
    $mail->IsSMTP(); // Ativar SMTP
    $mail->SMTPDebug = 0; // Debugar: 1 = erros e mensagens, 2 = mensagens apenas
    $mail->SMTPAuth = true; // Autenticação ativada
    $mail->SMTPSecure = 'ssl'; // SSL REQUERIDO pelo GMail
    $mail->Host = 'smtp.gmail.com'; // SMTP utilizado
    $mail->Port = 465; // A porta 465 deverá estar aberta em seu servidor
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
$sql_email = "select us.email from tb_agendamentos a, vw_usuarios us where str_to_date(a.data, '%Y-%m-%d') = str_to_date('" . date('Y-m-d', strtotime($data_antiga)) . "', '%Y-%m-%d') and a.hora = '" . $hora_antiga . "' and us.id = a.aluno_id and a.monitor_id = " . $_SESSION['tutor_id'];
$res_email = mysqli_query($mysqli, $sql_email);
while ($conn_email = mysqli_fetch_array($res_email)) {
    if (smtpmailer($conn_email['email'], 'arcs.si3@gmail.com', utf8_decode('Sistema de Agendamento Unicatólica'), 'Reagendamento', $mensagem_full)) {
        
    }
}
//envia email para o monitor
if (smtpmailer('arcs.si3@gmail.com', 'arcs.si3@gmail.com', utf8_decode('Sistema de Agendamento Unicatólica'), 'Reagendamento', utf8_decode($mensagem_monitor))) {
    
}

