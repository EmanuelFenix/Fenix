<?php
    $host = 'localhost';
    $user = 'root';
    $password = '';
    $database = 'jornal';

    $mysqli = new mysqli($host, $user, $password, $database);

    if ($mysqli->error) {
        die ("Erro: Problema na conexão a DB");
    }