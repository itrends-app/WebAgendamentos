<!DOCTYPE html>
<?php
session_name('aluno');
session_start();

include_once('../php/conexao.php');
include_once './php/hora_atual.php';
include './php/DataHoraAtual.php';

try {
    $st1 = $pdo->prepare("select *, us.firstname from tb_agendamentos ag, vw_usuarios us where ag.id = :agendamento and ag.aluno_id = us.id");
    $st1->bindValue(":agendamento", $_SESSION['id_agendamento']);
    $st1->execute();
    $con_busca_agenda = $st1->fetch(PDO::FETCH_ASSOC);
    $_SESSION['nome_aluno'] = $con_busca_agenda['firstname'];
    $_SESSION['horario'] = $con_busca_agenda['horario'];
    
    $st2 = $pdo->prepare("select * from tb_agendamentos ag, vw_usuarios us where us.id = ag.monitor_id and ag.id = :agendamento");
    $st2->bindValue(":agendamento", $_SESSION['id_agendamento']);
    $st2->execute();
    $con_busca_tutor = $st2->fetch(PDO::FETCH_ASSOC);
    $_SESSION['email_tutor'] = $con_busca_tutor['email'];
} catch (PDOException $e) {
    echo $e->getMessage();
}
?>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="UTF-8">
        <title>Cancelar Agendamento</title>
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
            ?>
            <div class="corpo">
                <div class="form-cancelamento">
                    <span class="fs fs-20">Cancelar Agendamento</span>
                    <div class="mg-top-10"></div>
                    <div class="ln-tracejada-1"></div>
                    <div class="mg-top-10"></div>
                    <?php
                    $data1 = date_create($data_atual_servidor . " " . $hora_atual_servidor);
                    $data_processada = date_add($data1, date_interval_create_from_date_string('24 hours'));
                    $data_atual = date('Y-m-d H:i', strtotime($con_busca_agenda['data'] . " " . $con_busca_agenda['hora']));
                    $data_controle = date('Y-m-d H:i', strtotime(date_format($data_processada, "Y-m-d H:i")));

                    if ($st1->rowCount() == 0) {
                        echo "<span class='fs fs-18'>Este agendamento já foi cancelado!</span>";
                    } else {
                        if ($data_controle > $data_atual) {
                            echo "<i class='fa fa-warning fa-2x c-yellow'></i>  ";
                            echo "<span class='fs fs-18'>Período para cancelar o agendamento expirou!</span><br><br>";
                            echo "<center><a href='consulta_agendamentos.php'><input type='button' value='Voltar' class='button button-orange'></a></center>";
                        } else {
                            ?>
                            <form id="form-cancel" action="./php/excluir_agendamento.php" method="post">
                                <span class="fs fs-14">Motivo:<b class="c-red">*</b></span>
                                <div class="mg-top-10"></div>
                                <textarea class="wdt-400 fs-14" id="motivo" name="motivo" required="true"></textarea>
                                <div class="mg-top-10"></div>
                                <input type="hidden" name="agend" value="<?php echo $_SESSION['id_agendamento']; ?>">
                                <input type="submit" value="Confirmar" id="confirm-cancel" class="button button-orange">
                            </form>
                            <?php
                        }
                    }
                    ?>
                </div>
            </div>
            <?php
            include_once '../layout/footer.php';
            ?>

        </div>
    </body>
</html>
<script type="text/javascript">

</script>
