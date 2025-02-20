<?php
include "../CONEXAO_PHP_DB/conexao.php";
include "../CONFIRMACAO_DE_ACESSO/confirmar_acesso.php";

    if (
        isset($_REQUEST["jornal"]) && $_REQUEST["jornal"] != ""
    ) {
        $jornal_name = $mysqli->real_escape_string($_POST["jornal"]) ?? "Indeterminado";

        $code1 = "UPDATE jornal
        SET nome = '$jornal_name'";
        $query1 = $mysqli->query($code1) or die("[ERROR]");
    }
    if (isset($_REQUEST["targetArea2"]) && $_REQUEST["targetArea2"] != "") {
        $foto = $mysqli->real_escape_string($_POST["targetArea2"]);

        $arquivo = $_FILES["postFoto"];
        $foto2 = "";

        for ($i = 11; $i < 50; $i++) {
            if ($foto[$i] == ';') {
                break;
            } else {
                $foto2 = $foto2 . $foto[$i];
            }
        }

        $renomeado = md5(time()) . ".$foto2";
        $caminho = "arquivos/";

        if (move_uploaded_file($arquivo['tmp_name'], $caminho . $renomeado)) {
            $caminhoAtual = $caminho . $renomeado;
            $code2 = "UPDATE jornal
            SET img = '$caminhoAtual'";
            $query2 = $mysqli->query($code2) or die("[ERROR]");
        } else {
            echo "<p style=\"color: #f00;\">Erro: Arquio não enviado</p>";
        }
    }

    if (
        isset($_REQUEST["targetArea22"]) && $_REQUEST["targetArea22"] != ""
        ||
        isset($_REQUEST["postTextTITULO2"]) && $_REQUEST["postTextTITULO2"] != ""
        ||
        isset($_REQUEST["postText2"]) && $_REQUEST["postText2"] != ""
        ||
        isset($_REQUEST["categoria"]) && $_REQUEST["categoria"] != ""
    ) {
        $tituloPOST = $mysqli->real_escape_string($_POST["postTextTITULO2"]);
        $descricaoPOST1 = $mysqli->real_escape_string($_POST["postText2"]);
        $descricaoPOST2 = $mysqli->real_escape_string($_POST["postText3"]);
        $fotoPOST = $mysqli->real_escape_string($_POST["targetArea22"]);
        $categoria = $mysqli->real_escape_string($_POST["categoria"]);

        $arquivoPOST = $_FILES["postFoto2"];
        $fotoPOST2 = "";

        for ($i = 11; $i < 50; $i++) {
            if ($fotoPOST[$i] == ';') {
                break;
            } else {
                $fotoPOST2 = $fotoPOST2 . $fotoPOST[$i];
            }
        }

        if ($fotoPOST2 == 'mp4') {
            $renomeadoPOST = "VID_" . md5(time()) . ".$fotoPOST2";
        } else {
            $renomeadoPOST = "IMG_" . md5(time()) . ".$fotoPOST2";
        }

        $caminhoPOST = "posts_img/";

        if (move_uploaded_file($arquivoPOST['tmp_name'], $caminhoPOST . $renomeadoPOST)) {
            $caminhoAtualPOST = $caminhoPOST . $renomeadoPOST;
            $code3 = "INSERT INTO postagem VALUES (
            default,
            '$caminhoAtualPOST',
            '$tituloPOST',
            '$descricaoPOST1',
            '$descricaoPOST2',
            '$categoria',
            '0'
            )";
            $query3 = $mysqli->query($code3) or die("[ERROR]");
        } else {
            echo "<p style=\"color: #f00;\">Erro: Arquio não enviado</p>";
        }
    }

    if (
        isset($_REQUEST["titulo"]) && $_REQUEST["titulo"] != ""
    ) {
        $titulo = $mysqli->real_escape_string($_POST["titulo"]);
        $code4 = "UPDATE jornal
        SET titulo = '$titulo'";
        $query4 = $mysqli->query($code4) or die ("[ERROR]");
    }
    if (isset($_REQUEST["txt"]) && $_REQUEST["txt"] != "") {
        $txt = $mysqli->real_escape_string($_POST["txt"]);
        $code4 = "UPDATE jornal
        SET txt = '$txt'";
        $query4 = $mysqli->query($code4) or die ("[ERROR]");
    }
    if (isset($_REQUEST["titulo1"]) && $_REQUEST["titulo1"] != "") {
        $titulo1 = $mysqli->real_escape_string($_POST["titulo1"]);
        $code4 = "UPDATE jornal
        SET titulo1 = '$titulo1'";
        $query4 = $mysqli->query($code4) or die ("[ERROR]");
    }
    if (isset($_REQUEST["txt1"]) && $_REQUEST["txt1"] != "") {
        $txt1 = $mysqli->real_escape_string($_POST["txt1"]);
        $code4 = "UPDATE jornal
        SET txt1 = '$txt1'";
        $query4 = $mysqli->query($code4) or die ("[ERROR]");
    }
    if (isset($_REQUEST["titulo2"]) && $_REQUEST["titulo2"] != "") {
        $titulo2 = $mysqli->real_escape_string($_POST["titulo2"]);
        $code4 = "UPDATE jornal
        SET titulo2 = '$titulo2'";
        $query4 = $mysqli->query($code4) or die ("[ERROR]");
    }
    if (isset($_REQUEST["txt2"]) && $_REQUEST["txt2"] != "") {
        $txt2 = $mysqli->real_escape_string($_POST["txt2"]);
        $code4 = "UPDATE jornal
        SET txt2 = '$txt2'";
        $query4 = $mysqli->query($code4) or die ("[ERROR]");
    }
    
    if (
        isset($_REQUEST["old_password"]) && $_REQUEST["old_password"] != ""
        ||
        isset($_REQUEST["new_password"]) && $_REQUEST["new_password"] != ""
    ) {
        $old_password = $mysqli->real_escape_string($_POST["old_password"]);
        $new_password = $mysqli->real_escape_string($_POST["new_password"]);
        $code5 = "SELECT * FROM usuario WHERE pass = SHA2('$old_password', 256)";
        $query5 = $mysqli->query($code5) or die ("[ERROR]");
        $results = $mysqli->affected_rows;
        if ($results != 0) {
            $code6 = "UPDATE usuario
            SET pass = SHA2('$new_password', 256)
            WHERE id = '0'";
            $query6 = $mysqli->query($code6) or die ("[ERROR]");
        }
    }

    header("location: index.php");
    