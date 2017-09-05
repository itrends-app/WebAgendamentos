<?php

$caty = $_POST['cat'];
$string = "";
try {
    include_once('./conexao.php');
    $stmt2 = $pdo->prepare("select id_category, name from vw_categorias where parent = :cat_pai");
    $stmt2->bindValue(":cat_pai", $caty);
    $stmt2->execute();

    if ($stmt2->rowCount() > 0) {
        while ($cat = $stmt2->fetch(PDO::FETCH_ASSOC)) {
            $string .= '<optgroup label="' . $cat['name'] . '">';
            $stmt = $pdo->prepare("select * from vw_cursos where category = :cat order by fullname");
            $stmt->bindValue(":cat", $cat['id_category']);
            $stmt->execute();
            while ($linha = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $string .= '<option value="' . $linha['id_course'] . '">' . $linha['fullname'] . '</option>';
            }
            $string .= '</optgroup>';
        }
        echo utf8_encode($string);
    } else {
        echo "not";
    }
} catch (PDOException $ex) {
    echo $ex->getMessage();
}
