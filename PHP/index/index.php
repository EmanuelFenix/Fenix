<?php
include "../CONEXAO_PHP_DB/conexao.php";
include "../CONFIRMACAO_DE_ACESSO/confirmar_acesso.php";

$code1 = "SELECT * FROM jornal";
        $query1 = $mysqli->query($code1) or die("[ERROR]");
        $dado1 = $query1->fetch_array();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../CSS/index.css">
    <link rel="stylesheet" href="../../CSS/configure.css">
    <link rel="icon" type="icon" href="<?php echo "../index/" . $dado1["img"]; ?>">
    <script defer src="../../JS/index.js"></script>
    <script defer src="../../JS/configure.js"></script>
    <title>FN | CONFIGURAÇÕES</title>
</head>

<body>
    <header>
        <a class="close" href="../sessao/logout.php">Sair</a>
        <div class="water-mark">
            <h1 class="wm-title title-header">FÊNIX News<em style="color: #ff0088; font-size: 12px;">CONFIGURATIONS</em></h1>
        </div>
        <div class="jornal">
            <h1 class="jornal-name title-header">

                <form action="aply.php" method="post">
                    <input type="text" name="jornal" value="<?php echo $dado1["nome"]; ?>">
                </form>

            </h1>
            <label class="acc" for="postFoto">
                <span class="sp-jornal-logo">
                    <img class="img-jornal-logo lab" src="<?php echo "../index/" . $dado1["img"]; ?>" alt="jornal-LOGO">
                </span>
            </label>
            <form action="aply.php" method="post" enctype="multipart/form-data">
                <input type="file" class="input hidd" name="postFoto" id="postFoto">
                <input type="text" name="targetArea2" class="for_use2 hidd">
                <input type="submit" class="submit alter" name="alterar" value="Alterar">
            </form>
        </div>
    </header>
    <!-- <ul class="links-top">
        <li class="link-top"><a class="a" href="index.php">Inicio</a></li>
        <li class="link-top"><a class="a" href="#novidades">Novidades</a></li>
        <li class="link-top"><a class="a" href="#tudo">Tudo</a></li>
        <li class="link-top"><a class="a" href="#mais">Mais</a></li>
    </ul> -->
    <main class="main" id="main">
        <h1 class="title3">Configure as suas manchetes começando pela principal</h1>
        <form action="aply.php" method="post" class="alterar">
            <label for="titulo">Título principal
                <input type="text" name="titulo" id="titulo" placeholder="<?php echo $dado1["titulo"]; ?>">
            </label>
            <label for="txt">Texto principal
                <input type="text" name="txt" id="txt" placeholder="<?php echo $dado1["txt"]; ?>">
            </label>
            <label for="titulo1">Título 1
                <input type="text" name="titulo1" id="titulo1" placeholder="<?php echo $dado1["titulo1"]; ?>">
            </label>
            <label for="txt1">Texto 1
                <input type="text" name="txt1" id="txt1" placeholder="<?php echo $dado1["txt1"]; ?>">
            </label>
            <label for="titulo2">Título 2
                <input type="text" name="titulo2" id="titulo2" placeholder="<?php echo $dado1["titulo2"]; ?>">
            </label>
            <label for="txt2">Texto 2
                <input type="text" name="txt2" id="txt2" placeholder="<?php echo $dado1["txt2"]; ?>">
            </label>
            <input type="submit" class="submit" value="Alterar">
        </form>
        <h1 class="title">Poste uma matéria no feed e atualize os visitantes</h1>

        <form action="" method="get">
            <label for="criar">Criar nova categoria de POST
                <input type="text" name="criar" id="criar">
            </label>
            <input type="submit" class="submit" value="Criar">
        </form>
        <form action="" method="get">
        <label for="remover">Remover categoria
                <select name="remover" id="remover">
                    <?php
                    $code6 = "SELECT * FROM categorias";
                    $query6 = $mysqli->query($code6) or die("[ERROR]");
                    while ($dado6 = $query6->fetch_array()) {
                    ?>
                        <option value="<?php echo $dado6["nome"]; ?>"><?php echo $dado6["nome"]; ?></option>
                    <?php
                    }
                    ?>
                </select>
            </label>
            <input type="submit" class="submit" value="Remover">
        </form>

        <?php
        if (isset($_REQUEST["criar"]) && $_REQUEST["criar"] != "") {
            $nome = $mysqli->real_escape_string($_GET["criar"]);
            $code6 = "SELECT nome FROM categorias WHERE nome = '$nome'";
            $query6 = $mysqli->query($code6) or die("[ERROR]");
            if ($mysqli->affected_rows != 0) {
                echo "<p style=\"color: #ff0000;\"><em>Categoria já existente</em></p>";
            } else {
                $code7 = "INSERT INTO categorias VALUES (
                default,
                '$nome'
                )";
                $query7 = $mysqli->query($code7) or die("[ERROR]");
            }
        }
        
        if (isset($_REQUEST["remover"]) && $_REQUEST["remover"] != "") {
            $nome = $mysqli->real_escape_string($_GET["remover"]);
            $code6 = "DELETE FROM categorias WHERE nome = '$nome'";
            $query6 = $mysqli->query($code6) or die("[ERROR]");
        }
        ?>

        <div class="conj">
            <form action="aply.php" class="postar" id="postar" method="post" enctype="multipart/form-data">
                <input type="file" class="input2 hidd" name="postFoto2" id="postFoto2">
                <input type="text" name="targetArea22" class="for_use22 hidd">

                <div for="" class="master2">
                    <label for="categoria">categoria
                        <select name="categoria" id="categoria">
                            <?php
                            $code5 = "SELECT * FROM categorias";
                            $query5 = $mysqli->query($code5) or die("[ERROR]");
                            while ($dado5 = $query5->fetch_array()) {
                            ?>
                                <option value="<?php echo $dado5["nome"]; ?>"><?php echo $dado5["nome"]; ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </label>
                    <label for="postFoto2" class="lab2">
                        Selecionar Imagem ou Vídeo
                    </label>
                    <label for="">Título
                        <textarea name="postTextTITULO2" class="input2 inp2" id="postTextTITULO2" cols="30" rows="10">Título</textarea>
                    </label>
                    Descrição 1
                    <textarea name="postText2" class="input2 inp2" id="postText2" cols="30" rows="10">Descrição 1</textarea>
                    Descrição 2
                    <textarea name="postText3" class="input2 inp2" id="postText3" cols="30" rows="10">Descrição 2</textarea>
                    <input type="submit" class="submit" value="Postar">
                </div>
            </form>
            <div class="div">
                <h1 class="title3">Por que postar com frequência?</h1>
                <h3>
                    Postando com uma boa frequência, você abitua seus visitantes com dinamismo e consegues prender sua atenção caso as manchetes e matérias sejam de qualidade e confiáveis.
                </h3>
                <h3>
                    Inspecione sempre o comportamento da página principal bem <a href="../../HTML/index.php" target="_blank" rel="noopener noreferrer"><em style="color: #ff0000;">AQUI</em></a>
                </h3>
            </div>
        </div>
        <?php
        if (isset($_REQUEST["id"])) {
            $id = $_GET["id"];

            if (isset($_GET["done"])) {
                if (isset($_GET["tituloPOST"]) && $_GET["tituloPOST"] != "") {
                    $tituloPOST = $mysqli->real_escape_string($_GET["tituloPOST"]);
                    $code = "UPDATE postagem
                    SET titulo1 = '$tituloPOST'
                    WHERE id = '$id'";
                    $query = $mysqli->query($code) or die("[ERROR]");
                }
                if (isset($_GET["txt1POST"]) && $_GET["txt1POST"] != "") {
                    $txt1POST = $mysqli->real_escape_string($_GET["txt1POST"]);
                    $code = "UPDATE postagem
                    SET txt1 = '$txt1POST'
                    WHERE id = '$id'";
                    $query = $mysqli->query($code) or die("[ERROR]");
                }
                if (isset($_GET["txt2POST"]) && $_GET["txt2POST"] != "") {
                    $txt2POST = $mysqli->real_escape_string($_GET["txt2POST"]);
                    $code = "UPDATE postagem
                    SET txt2 = '$txt2POST'
                    WHERE id = '$id'";
                    $query = $mysqli->query($code) or die("[ERROR]");
                }
            }

            if (isset($_GET["drop"])) {
                $code2 = "DELETE FROM postagem WHERE id = '$id'";
                $query2 = $mysqli->query($code2) or die("[ERROR]");
            }
        }
        ?>
        <div class="dm">
            <h1 class="title" id="novidades">Edite, Concerte e Remova</h1>
        </div>

        <div class="dm">
            <div class="title2">Ir para:</div>
            <?php
            $code3 = "SELECT * FROM categorias ORDER BY id";
            $query3 = $mysqli->query($code3) or die("[ERROR]");
            while ($dado3 = $query3->fetch_array()) {
                $cat = $dado3["nome"];
            ?>
                <a class="go" href="#<?php echo $cat; ?>"><?php echo $cat; ?></a>
            <?php
            }
            ?>
        </div>

        <?php
        $code3 = "SELECT * FROM categorias ORDER BY id";
        $query3 = $mysqli->query($code3) or die("[ERROR]");
        while ($dado3 = $query3->fetch_array()) {
            $cat = $dado3["nome"];
            echo "<div class=\"dm\" id=\"$cat\">Categoria: <h1 class=\"title2\">" . $cat . "</h1></div>";
        ?>

            <div class="editPosts">
                <?php
                $code2 = "SELECT * FROM postagem WHERE categoria = '$cat' ORDER BY views DESC";
                $query2 = $mysqli->query($code2) or die("[ERROR]");
                $total = $mysqli->affected_rows;
                echo "<h1>Items:</h1><h1 class='title3'>$total</h1>";
                while ($dado2 = $query2->fetch_array()) {
                ?>
                    <div class="ePost">
                        <span class="show">
                            <?php
                            if ($dado2["foto"][10] == 'V') {
                            ?>
                                <video class="sh" autoplay muted loop src="<?php echo $dado2["foto"]; ?>"></video>
                            <?php
                            } else if ($dado2["foto"][10] == 'I') {
                            ?>
                                <img class="sh" src="<?php echo $dado2["foto"]; ?>">
                            <?php
                            }
                            ?>
                            <div class="vws"><?php echo $dado2["views"]; ?></div>
                        </span>
                        <form action="" method="get">
                            <input name="id" class="hidd" value="<?php echo $dado2["id"]; ?>">
                            <textarea class="textArea" name="tituloPOST" id="tituloPOST"><?php echo $dado2["titulo1"]; ?></textarea>
                            <textarea class="textArea" name="txt1POST" id="txt1POST"><?php echo $dado2["txt1"]; ?></textarea>
                            <textarea class="textArea" name="txt2POST" id="txt2POST"><?php echo $dado2["txt2"]; ?></textarea>
                            <div class="bts">
                                <button type="submit" name="done" class="bt_done bt">
                                    <span>
                                        <img src="../../IMG/png icons/OkDone_80.contrast-black.png">
                                    </span>
                                </button>
                                <button type="submit" name="drop" class="bt_drop bt">
                                    <span>
                                        <img src="../../IMG/png icons/X_80.contrast-black.png">
                                    </span>
                                </button>
                            </div>
                        </form>
                    </div>
                <?php
                }
                ?>
            </div>

        <?php
        }
        ?>
        <h1 class="title">Altere seu acesso</h1>
        <form action="aply.php" method="post" class="postar">
            <input type="password" name="old_password" placeholder="Password Antiga">
            <input type="password" name="new_password" placeholder="Nova Password">
            <input type="submit" class="submit" value="Alterar">
        </form>
    </main>
    <footer class="footer">
        <p class="footer">Produção 100% Tech Whizzes<br>Todos os direiros reservados <a href="https://www.facebook.com/profile.php?id=61561000115418" target="_blank" style="color: #002244;"><em>Emanuel Domingos da Silva</em></a></p>
    </footer>
</body>

</html>