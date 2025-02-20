<?php
include "../CONEXAO_PHP_DB/conexao.php";
if (!isset($_SESSION)) {
    session_start();
}

session_destroy();

header ("location: ../../HTML/logIN.html");
