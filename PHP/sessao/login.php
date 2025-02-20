<?php
include("../CONEXAO_PHP_DB/conexao.php");

//$mail_do_usuario = $mysqli->real_escape_string($_POST["mail-do-usuario"]);
if (isset($_POST["password-do-usuario"]) && $_POST["password-do-usuario"] != "") {
    $password_do_usuario = $mysqli->real_escape_string($_POST["password-do-usuario"]);

    $code1 = "SELECT * FROM usuario
    WHERE pass = SHA2('$password_do_usuario', 256)";

    $query1 = $mysqli->query($code1) or die("[ERROR]");

    $quantidade = $query1->num_rows;

    if ($quantidade == 1) {

        $usuario = $query1->fetch_assoc();

        if (!isset($_SESSION)) {
            session_start();
        }

        $_SESSION['nome-do-usuario'] = $usuario['nome'];
        //$_SESSION['mail-do-usuario'] = $usuario['mail'];

        header("location: ../index/index.php");
    } else {
        header("location: ../../html/logIN.html");
    }
} else {
    header("location: ../../html/logIN.html");
}
