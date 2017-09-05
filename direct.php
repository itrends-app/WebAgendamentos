 <?php

include_once('./php/conexao.php');

$usuario_autenticado = $_GET['id'];
$identificacao_curso = $_GET['curso'];

$st = $pdo->prepare('SELECT * FROM tb_horarios_monitor WHERE monitor_id = :user');
$st->bindValue(":user", $usuario_autenticado);
$st->execute();

$stmt = $pdo->prepare('SELECT firstname FROM vw_usuarios WHERE id = :usuario_logado');
$stmt->bindValue(":usuario_logado", $usuario_autenticado);
$stmt->execute();
$dados = $stmt->fetch(PDO::FETCH_ASSOC);

if ($st->rowCount() > 0) {
    session_name('tutor');
    session_start();
    
    $_SESSION['tutor_id'] = $usuario_autenticado;
    $_SESSION['curso_id'] = $identificacao_curso;
    $_SESSION['nome_usuario'] = $dados['firstname'];
    
    header("Location:./tutor/index.php");
} else {
    session_name('aluno');
    session_start();
    
    $st2 = $pdo->prepare("select email from vw_usuarios where id = :id");
    $st2->bindValue(":id", $usuario_autenticado);
    $st2->execute();
    $conn = $st2->fetch(PDO::FETCH_ASSOC);

    $_SESSION['aluno'] = $usuario_autenticado;
    $_SESSION['sel_curso'] = $identificacao_curso;
    $_SESSION['email_aluno'] = $conn['email'];
    $_SESSION['nome_usuario'] = $dados['firstname'];

    header("Location:./aluno/index.php");
}
