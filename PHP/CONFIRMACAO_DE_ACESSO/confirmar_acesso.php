<?php
    if (!isset($_SESSION)) {
        session_start();
    }

    if (!isset($_SESSION["nome-do-usuario"])) {
        die (header("location: ../../html/logIN.html"));
    }