<?php
include "../PHP/CONEXAO_PHP_DB/conexao.php";

$code1 = "SELECT * FROM jornal";
$query1 = $mysqli->query($code1) or die("[ERROR]");
$dado1 = $query1->fetch_array();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/index.css">
    <link rel="icon" type="icon" href="<?php echo "../PHP/index/" . $dado1["img"]; ?>">
    <script defer src="../JS/index.js"></script>
    <title>FÊNIX News</title>
</head>

<body>
    <header>
        <div class="water-mark">
            <h1 class="wm-title title-header">FÊNIX News</h1>
        </div>
        <div class="jornal">
            <h1 class="jornal-name title-header"><?php echo $dado1["nome"]; ?></h1>
            <span class="sp-jornal-logo">
                <img class="img-jornal-logo" src="<?php echo "../PHP/index/" . $dado1["img"]; ?>" alt="jornal-LOGO">
            </span>
        </div>
    </header>
    <ul class="links-top">
        <li class="link-top"><a class="a" href="index.php">Inicio</a></li>
        <li class="link-top"><a class="a" href="#novidades">Novidades</a></li>
        <li class="link-top"><a class="a" href="#tudo">Tudo</a></li>
        <li class="link-top"><a class="a" href="#mais">Mais</a></li>
    </ul>
    <main class="main" id="main">
        <form action="" method="get" class="search_area">
            <input type="search" name="search" id="search">
            <button type="submit" class="btn_search">
                <span>
                    <img src="../IMG/png icons/search-regular-24.png">
                </span>
            </button>
        </form>
        <?php
        if (isset($_GET["search"]) && $_GET["search"] != "") {
            $searched = $mysqli->real_escape_string($_GET["search"]);
            $code2 = "SELECT * FROM postagem
                WHERE titulo1 LIKE '%$searched%' OR
                txt1 LIKE '%$searched%' OR
                txt2 LIKE '%$searched%'
                ORDER BY views DESC";
            $query2 = $mysqli->query($code2) or die("[ERROR]");
            $qt = $mysqli->affected_rows;
            echo "<h1 class=\"title\">$qt resultados da pesquisa \" $searched \"</h1>";
        }
        ?>
        <div class="results">
            <?php
            if (isset($_GET["search"]) && $_GET["search"] != "") {
                $searched = $mysqli->real_escape_string($_GET["search"]);
                $code2 = "SELECT * FROM postagem
                WHERE titulo1 LIKE '%$searched%' OR
                txt1 LIKE '%$searched%' OR
                txt2 LIKE '%$searched%'
                ORDER BY views DESC";
                $query2 = $mysqli->query($code2) or die("[ERROR]");
                while ($dado2 = $query2->fetch_array()) {
                    $id = $dado2["id"];
                    $views = $dado2["views"];
            ?>
                    <!-- onclick="javascript:location.href='../PHP/view/view.php?view=<?php echo $id; ?>'" -->
                    <div class="post" onclick="<?php echo "javascript:location.href='../PHP/index/aply2.php?id=$id&views=$views'"; ?>">
                        <!-- <input type="text" name="id" style="pointer-events: none; width: 0; height: 0;" value="<?php echo $dado2["id"]; ?>"> -->
                        <div class="ct1">
                            <div class="sp">
                                <?php
                                if ($dado2["foto"][10] == 'V') {
                                ?>
                                    <video autoplay muted loop src="<?php echo "../PHP/index/" . $dado2["foto"]; ?>"></video>
                                <?php
                                } else if ($dado2["foto"][10] == 'I') {
                                ?>
                                    <img src="<?php echo "../PHP/index/" . $dado2["foto"]; ?>">
                                <?php
                                }
                                ?>
                                <div class="vws"><?php echo $dado2["views"]; ?></div>
                            </div>
                            <div class="comment comments1">
                                <p class="cat"><em><?php echo $dado2["categoria"]; ?></em></p>
                                <h1 class="titulo1"><?php echo $dado2["titulo1"]; ?></h1>
                                <h4 class="text text1">
                                    <?php echo nl2br($dado2["txt1"]); ?>
                                </h4>
                                <hr class="hr">
                                <p class="pp">Veja Mais</p>
                                <!-- <form action="../PHP/index/aply.php" method="post" class="lk">
            <button type="submit" class="like">
                <span>
                    <img src="../IMG/png icons/like.jpg">
                </span>
            </button>
            <input name="idLIKE" class="hidd" value="<?php echo $dado2["id"]; ?>">
            <input type="number" name="lks" class="lks" value="<?php
                                                                if ($dado2["likes"] == "") {
                                                                    echo 0;
                                                                } else {
                                                                    echo $dado2["likes"];
                                                                }
                                                                ?>">
        </form> -->
                            </div>
                        </div>
                        <!-- <div class="ct2">
    <div class="comment comments2">
        
    </div>
</div> -->
                    </div>
                    </label>
            <?php
                }
            }
            ?>
        </div>
        <div class="intro">
            <div class="main-banner" style="background-image: url('<?php echo "../PHP/index/" . $dado1["img"]; ?>');">
                <div class="content">
                    <h1 class="title"><?php echo $dado1["titulo"]; ?></h1>
                    <p>
                        <em>
                            <?php echo $dado1["txt"]; ?>
                        </em>
                    </p>
                </div>
            </div>
            <div class="secundaries-banners">
                <div class="banner st1">
                    <h1 class="title2"><?php echo $dado1["titulo1"]; ?></h1>
                    <p class="p">
                        <?php echo nl2br($dado1["txt1"]); ?>
                    </p>
                </div>
                <div class="banner st2">
                    <h1 class="title2"><?php echo $dado1["titulo2"]; ?></h1>
                    <p class="p">
                        <?php echo nl2br($dado1["txt2"]); ?>
                    </p>
                </div>
            </div>
        </div>
        <div class="dm">
            <h1 class="title" id="novidades">Novidades</h1>
        </div>
        <div class="posts posts2">
            <?php
            $code2 = "SELECT * FROM postagem ORDER BY id DESC LIMIT 5";
            $query2 = $mysqli->query($code2) or die("[ERROR]");
            while ($dado2 = $query2->fetch_array()) {
                $id = $dado2["id"];
                $views = $dado2["views"];
            ?>
                <div class="post" onclick="<?php echo "javascript:location.href='../PHP/index/aply2.php?id=$id&views=$views'"; ?>">
                    <input type="text" name="id" style="pointer-events: none; width: 0; height: 0;" value="<?php echo $dado2["id"]; ?>">
                    <div class="ct1">
                        <div class="sp">
                            <?php
                            if ($dado2["foto"][10] == 'V') {
                            ?>
                                <video autoplay muted loop src="<?php echo "../PHP/index/" . $dado2["foto"]; ?>"></video>
                            <?php
                            } else if ($dado2["foto"][10] == 'I') {
                            ?>
                                <img src="<?php echo "../PHP/index/" . $dado2["foto"]; ?>">
                            <?php
                            }
                            ?>
                            <div class="vws"><?php echo $dado2["views"]; ?></div>
                        </div>
                        <div class="comment comments1">
                            <p class="cat"><em><?php echo $dado2["categoria"]; ?></em></p>
                            <h1 class="titulo1"><?php echo $dado2["titulo1"]; ?></h1>
                            <hr class="hr">
                            <p class="pp">Veja Mais</p>
                        </div>
                    </div>
                    <!-- <div class="ct2">
                    <div class="comment comments2">
                        
                    </div>
                </div> -->
                </div>
            <?php
            }
            ?>
        </div>

        <div class="dm">
            <div class="title" id="tudo">Tudo</div>
        </div>

        <div class="dm">
            <?php
            $code3 = "SELECT * FROM categorias ORDER BY id";
            $query3 = $mysqli->query($code3) or die("[ERROR]");
            $dado3 = $query3->fetch_assoc();
            $quant = $mysqli->affected_rows;
            if ($quant != 0) {
                $cat = $dado3["nome"];
            }
            ?>
        </div>

        <?php
        $code3 = "SELECT * FROM categorias ORDER BY id";
        $query3 = $mysqli->query($code3) or die("[ERROR]");
        while ($dado3 = $query3->fetch_array()) {
            $cat = $dado3["nome"];
            $code4 = "SELECT * FROM postagem WHERE categoria = '$cat'";
            $query4 = $mysqli->query($code4) or die("[ERROR]");
            $quant = $mysqli->affected_rows;
            echo "<div class=\"dm\" id=\"$cat\">$quant itens encontrados na categoria: <h1 class=\"title2\">" . $cat . "</h1></div>";
        ?>

            <div class="posts">

                <?php
                $code2 = "SELECT * FROM postagem WHERE categoria = '$cat' ORDER BY views DESC LIMIT 4";
                $query2 = $mysqli->query($code2) or die("[ERROR]");
                while ($dado2 = $query2->fetch_array()) {
                    $id = $dado2["id"];
                    $views = $dado2["views"];
                ?>
                    <!-- onclick="javascript:location.href='../PHP/view/view.php?view=<?php echo $id; ?>'" -->
                    <div class="post" onclick="<?php echo "javascript:location.href='../PHP/index/aply2.php?id=$id&views=$views'"; ?>">
                        <!-- <input type="text" name="id" style="pointer-events: none; width: 0; height: 0;" value="<?php echo $dado2["id"]; ?>"> -->
                        <div class="ct1">
                            <div class="sp">
                                <?php
                                if ($dado2["foto"][10] == 'V') {
                                ?>
                                    <video autoplay muted loop src="<?php echo "../PHP/index/" . $dado2["foto"]; ?>"></video>
                                <?php
                                } else if ($dado2["foto"][10] == 'I') {
                                ?>
                                    <img src="<?php echo "../PHP/index/" . $dado2["foto"]; ?>">
                                <?php
                                }
                                ?>
                                <div class="vws"><?php echo $dado2["views"]; ?></div>
                            </div>
                            <div class="comment comments1">
                                <p class="cat"><em><?php echo $dado2["categoria"]; ?></em></p>
                                <h1 class="titulo1"><?php echo $dado2["titulo1"]; ?></h1>
                                <h4 class="text text1">
                                    <?php echo nl2br($dado2["txt1"]); ?>
                                </h4>
                                <hr class="hr">
                                <p class="pp">Veja Mais</p>
                                <!-- <form action="../PHP/index/aply.php" method="post" class="lk">
                            <button type="submit" class="like">
                                <span>
                                    <img src="../IMG/png icons/like.jpg">
                                </span>
                            </button>
                            <input name="idLIKE" class="hidd" value="<?php echo $dado2["id"]; ?>">
                            <input type="number" name="lks" class="lks" value="<?php
                                                                                if ($dado2["likes"] == "") {
                                                                                    echo 0;
                                                                                } else {
                                                                                    echo $dado2["likes"];
                                                                                }
                                                                                ?>">
                        </form> -->
                            </div>
                        </div>
                        <!-- <div class="ct2">
                    <div class="comment comments2">
                        
                    </div>
                </div> -->
                    </div>
                    </label>
                <?php
                }
                ?>

            </div>

            <a class="go" href="cat/cat.php?categoria=<?php echo $cat; ?>">Ver mais da categoria - <?php echo $cat; ?></a>

        <?php
        }
        ?>

    </main>
    <footer class="footer" id="mais">
        <p class="footer">Produção 100% Tech Whizzes<br>Todos os direiros reservados <a href="https://www.facebook.com/profile.php?id=61561000115418" target="_blank" style="color: #002244;"><em>Emanuel Domingos da Silva</em></a></p>
    </footer>
</body>

</html>