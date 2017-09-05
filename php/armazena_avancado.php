<?php


session_start();

$_SESSION['aviso_min'] = $_POST['aviso_minimo'];
$_SESSION['und_tempo'] = $_POST['und_tempo'];
$_SESSION['limite'] = $_POST['limite'];
$cursoid = $_SESSION['curso'];
$userid = $_SESSION['monitor'];

try {
    include_once('./conexao.php');
    $st1 = $pdo->prepare("select * from vw_cursos where id_course = :curso_id");
    $st1->bindValue(":curso_id", $cursoid);
    $st1->execute();
    $con1 = $st1->fetch(PDO::FETCH_ASSOC);
    
    $st2 = $pdo->prepare("select * from vw_usuarios where id = :userid");
    $st2->bindValue(":userid", $userid);
    $st2->execute();
    $con2 = $st2->fetch(PDO::FETCH_ASSOC);
} catch (PDOException $exc) {
    echo $exc->getTraceAsString();
}

echo "<b>Agendado para:</b><br>";
if ($_SESSION['segunda'] != "") {
    echo "Segunda-feira: " . $_SESSION['seg_ini'] . " até " . $_SESSION['seg_fim'] . "<br>";
}
if ($_SESSION['terca'] != "") {
    echo "Terça-feira: " . $_SESSION['ter_ini'] . " até " . $_SESSION['ter_fim'] . "<br>";
}
if ($_SESSION['quarta'] != "") {
    echo "Quarta-feira: " . $_SESSION['qua_ini'] . " até " . $_SESSION['qua_fim'] . "<br>";
}
if ($_SESSION['quinta'] != "") {
    echo "Quinta-feira: " . $_SESSION['qui_ini'] . " até " . $_SESSION['qui_fim'] . "<br>";
}
if ($_SESSION['sexta'] != "") {
    echo "Sexta-feira: " . $_SESSION['sex_ini'] . " até " . $_SESSION['sex_fim'] . "<br>";
}
if ($_SESSION['sabado'] != "") {
    echo "Sábado: " . $_SESSION['sab_ini'] . " até " . $_SESSION['sab_fim'] . "<br>";
}
if ($_SESSION['domingo'] != "") {
    echo "Domingo: " . $_SESSION['dom_ini'] . " até " . $_SESSION['dom_fim'] . "<br>";
}
echo "Disciplina: ".utf8_encode($con1['fullname']) . "<br>Tutor: ".utf8_encode($con2['firstname']);

