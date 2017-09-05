<?php

include_once './php/valida_usuario.php';
require_once '../recaptchalib.php';
include_once('../php/conexao.php');
foreach ($_POST as $key => $value) {
    //echo '<p><strong>' . $key . ':</strong> ' . $value . '</p>';
}

$secret = "6LdBkhYUAAAAAGhs6OH23vCUxEyICCXvNogb4yEt";
$response = null;
$reCaptcha = new ReCaptcha($secret);
if ($_POST["g-recaptcha-response"]) {
    $response = $reCaptcha->verifyResponse(
            $_SERVER["REMOTE_ADDR"], $_POST["g-recaptcha-response"]
    );
}
?>
<!DOCTYPE html>

<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="UTF-8">
        <title><?php include '../layout/AplicationName.php';?></title>
        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="../css/menu.css">
        <link rel="stylesheet" href="../css/bootstrap.css">
        <link rel="stylesheet" href="../css/componentes.css">
        <link rel="stylesheet" href="css/aluno.css">
        <link rel="stylesheet" href="../css/menu-mobile.css" media="(max-width:760px)">
        <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script type="text/javascript" src="../js/jquery-1.11.1.min.js"></script>
        <script src='https://www.google.com/recaptcha/api.js?hl=pt-BR'></script>
    </head>
    <body>
        <div class="container">
            <?php
            include_once '../layout/header.php';
            include_once './btn-sair.php';
            ?>
            <div class="corpo">
                <div class="form-confirmacao">
                    <span class="fs fs-20 c-black">Confirmar Agendamento</span>
                    <div class="mg-top-10"></div>
                    <div class="ln-tracejada-1"></div>
                    <div class="mg-top-10"></div>
                    <?php
                    if ($response != null && $response->success) {
                        $data_marcada_new = $_SESSION['data_marcada'];
                        $stmt = $pdo->prepare("insert into tb_agendamentos (aluno_id, monitor_id, curso_id, horario, dia, hora, data) values (:aluno, :monitor, :curso, :horario, :dia, :hora, :data)");
                        $stmt->bindValue(":aluno", $_SESSION['aluno']);
                        $stmt->bindValue(":monitor", $_SESSION['monitor_selecionado']);
                        $stmt->bindValue(":curso", $_SESSION['sel_curso']);
                        $stmt->bindValue(":horario", $_SESSION['dia_marcado'] . " de " . utf8_decode($_SESSION['mes_marcado']) . " de " . $_SESSION['ano_marcado'] . " " . $_SESSION['hora_marcada']);
                        $stmt->bindValue(":dia", $_SESSION['dia_marcado']);
                        $stmt->bindValue(":hora", $_SESSION['hora_marcada']);
                        $stmt->bindValue(":data", date('Y-m-d', strtotime($data_marcada_new)));
                        $stmt->execute();
                        
                        if ($stmt) {

                            include_once './php/envia_email.php';
                            echo "<div> "
                            . "<i class='fa fa-check fa-2x c-green'></i> Agendamento realizado com sucesso!</div>";
                            echo "<div class='mg-top-10'></div>";
                            echo "<a href='horarios.php'><input type='button' value='Continuar' class='button button-orange wdt-125 hgt-35'></a>";
                        } else {
                            echo "<i class='fa fa-close fa-2x c-red'></i> Erro ao tentar confirmar o agendamento. Por favor entre em contato com o administrador do sistema!";
                            echo "<div class='mg-top-10'></div>";
                            echo "<a href='confirmar_agendamento.php'><input type='button' value='Voltar' class='button button-orange wdt-125 hgt-35'></a>";
                        }
                    } else {
                        ?>

                        <form id="form-confirm" name="form_confirm" method="post" action="" autocomplete="off">
                            Agendado para:
                            <div class="mg-top-10"></div>
                            <?php echo "<span>" . $_SESSION['dia_marcado'] . " de " . $_SESSION['mes_marcado'] . " de " . $_SESSION['ano_marcado'] . " " . $_SESSION['hora_marcada'] . " até ".date('H:i', strtotime($_SESSION['hora_marcada'].' + '.$_SESSION['grade2'].' minutes'))."<br>Curso: " . utf8_encode($_SESSION['disciplina']) . " <br>Tutor: " . utf8_encode($_SESSION['monitor_selecionado2']) . "</span>"; ?> 
                            <div class="mg-top-10"></div>
                            Confirmar email: 
                            <div class="mg-top-10"></div>
                            <input type="text" name="email" class="inp wdt-400 hgt-35 inp-catolica" required="true">
                            <div class="mg-top-10"></div>
                            <div class="g-recaptcha" data-sitekey="6LdBkhYUAAAAAKJo6YPbXCCzCy1YiX9UPHY1D_1e"></div>
                            <div class="mg-top-10"></div>
                            <a href="horarios.php"><input type="button" value="Cancelar" class="button wdt-125 hgt-35"></a>
                            <input type="submit" value="Confirmar" class="button button-orange wdt-125 hgt-35">
                        </form>
                    <?php } ?>
                </div>

            </div>
            <?php include_once '../layout/footer.php'; ?>
        </div>
    </div>
</body>
</html>
