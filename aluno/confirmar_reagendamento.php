<?php
session_name('aluno');
session_start();

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
        <title><?php include_once '../layout/AplicationName.php';?></title>
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
                    <span class="fs fs-20 c-black">Confirmar Reagendamento</span>
                    <div class="mg-top-10"></div>
                    <div class="ln-tracejada-1"></div>
                    <div class="mg-top-10"></div>
                    <?php
                    if ($response != null && $response->success) {
                        $data_marcada_new = $_SESSION['data_marcada'];
                        $stmt1 = $pdo->prepare("update tb_agendamentos set horario = :horario, dia = :dia, hora = :hora, data = :data, cont_agend = cont_agend + 1 where id = :id");
                        $stmt1->bindValue(":horario", $_SESSION['dia_marcado'] . " de " . utf8_decode($_SESSION['mes_marcado']) . " de " . $_SESSION['ano_marcado'] . " " . $_SESSION['hora_marcada']);
                        $stmt1->bindValue(":dia", $_SESSION['dia_marcado']);
                        $stmt1->bindValue(":hora", $_SESSION['hora_marcada']);
                        $stmt1->bindValue(":data", date('Y-m-d', strtotime($data_marcada_new)));
                        $stmt1->bindValue(":id", $_SESSION['id_agendamento']);
                        $stmt1->execute();
                        
                        if ($stmt1) {
                            
                            include_once './php/envia_email_edicao.php';
                            
                            echo "<div> "
                            . "<i class='fa fa-check fa-2x c-green'></i> Reagendamento realizado com sucesso!</div>";
                            echo "<div class='mg-top-10'></div>";
                            echo "<a href='http://neadteste.fcrs.edu.br/ava'><input type='button' value='Sair' class='button button-orange wdt-125 hgt-35'></a>";
                        } else {
                            echo "<i class='fa fa-close fa-2x c-red'></i> Erro ao tentar confirmar o agendamento. Por favor entre em contato com o administrador do sistema!";
                            echo "<div class='mg-top-10'></div>";
                            echo "<a href='confirmar_reagendamento.php'><input type='button' value='Voltar' class='button button-orange wdt-125 hgt-35'></a>";
                        }
                    } else {
                        ?>

                        <form id="form-confirm" name="form_confirm" method="post" action="" autocomplete="off">
                            Reagendado para: 
                            <div class="mg-top-10"></div>
                            <?php echo "<span>" . $_SESSION['dia_marcado'] . " de " . $_SESSION['mes_marcado'] . " de " . $_SESSION['ano_marcado'] . " " . $_SESSION['hora_marcada'] . "<br>" . $_SESSION['disciplina'] . " <br> " . $_SESSION['monitor_selecionado2'] . "</span>"; ?> 
                            <div class="mg-top-10"></div>
                            Motivo:
                            <div class="mg-top-10"></div>
                            <textarea class="inp-catolica" required="true" name="motivo"></textarea> 
                            <div class="mg-top-10"></div>
                            <div class="g-recaptcha" data-sitekey="6LdBkhYUAAAAAKJo6YPbXCCzCy1YiX9UPHY1D_1e"></div>
                            <div class="mg-top-10"></div>
                            <a href="editar_agendamento_aluno.php"><input type="button" value="Cancelar" class="button wdt-125 hgt-35"></a>
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
