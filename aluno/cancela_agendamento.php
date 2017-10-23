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
    <?php include_once('./imports/import_head.php'); ?>
    <body>
        <?php
        include_once('./imports/import_header.php');
        ?>
        <div class="container-fluid">

            <section class="main-content">
                <div class="title">Cancelar Agendamento</div>
                <?php
                $data1 = date_create($data_atual_servidor . " " . $hora_atual_servidor);
                $data_processada = date_add($data1, date_interval_create_from_date_string('24 hours'));
                $data_atual = date('Y-m-d H:i', strtotime($con_busca_agenda['data'] . " " . $con_busca_agenda['hora']));
                $data_controle = date('Y-m-d H:i', strtotime(date_format($data_processada, "Y-m-d H:i")));

                if ($st1->rowCount() == 0) {
                    echo "<span class='fs fs-18'>Este agendamento já foi cancelado!</span>";
                } else {
                    if ($data_controle > $data_atual) {
                        echo '<div class="alert alert-danger">';
                        echo '<span class="alert-msg"><strong>Período para cancelar o agendamento expirou!</strong></span>';
                        echo '</div>';
                        echo '<a href="consagendamentos.php"><button class="btn btn-success center-block">Voltar</button></a>';
                    } else {
                        ?>
                        <form id="form-cancel" action="./php/excluir_agendamento.php" method="post">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Motivo:</label>
                                        <textarea class="form-control" id="motivo" name="motivo" required="true"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-footer">
                                    <input type="hidden" name="agend" class="btn btn-success" value="<?php echo $_SESSION['id_agendamento']; ?>">
                                    <input type="submit" value="Confirmar" id="confirm-cancel" class="btn btn-success">
                                </div>
                            </div>
                        </form>
                        <?php
                    }
                }
                ?>
            </section>
        </div>
        <?php
        include_once('./imports/import_footer.php');
        ?>

    </body>
</html>

