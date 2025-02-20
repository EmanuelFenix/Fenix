<?php
include "../CONEXAO_PHP_DB/conexao.php";

    if (
        isset($_GET["id"]) && $_GET["id"] != ""
        ||
        isset($_GET["views"]) && $_GET["views"] != ""
    ) {
        $id = $mysqli->real_escape_string($_GET["id"]);
        $views = $mysqli->real_escape_string($_GET["views"]);
        $new_view = 0;

        $new_view = (int) $views + 1;
        echo "<br><br>NV" . $new_view;

        $code1 = "UPDATE postagem
        SET views = '$new_view'
        WHERE id = '$id'";
        $query1 = $mysqli->query($code1) or die("[ERROR]");

        header("location: ../view/view.php?view=$id");
    } else {
        header("location: ../../HTML/index.php");
    }

    