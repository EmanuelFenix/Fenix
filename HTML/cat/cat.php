<?php
include "../../PHP/CONEXAO_PHP_DB/conexao.php";

$code1 = "SELECT * FROM jornal";
        $query1 = $mysqli->query($code1) or die("[ERROR]");
        $dado1 = $query1->fetch_array();

$cat = $_GET["categoria"];
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../CSS/index.css">
    <link rel="icon" type="icon" href="<?php echo "../../PHP/index/" . $dado1["img"]; ?>">
    <script defer src="../../JS/index.js"></script>
    <title>FÊNIX News | <?php echo $cat; ?></title>
</head>

<body>
    <header>
        <div class="water-mark">
            <h1 class="wm-title title-header">FÊNIX News</h1>
        </div>
        <div class="jornal">
            <h1 class="jornal-name title-header"><?php echo $dado1["nome"]; ?></h1>
            <span class="sp-jornal-logo">
                <img class="img-jornal-logo" src="<?php echo "../../PHP/index/" . $dado1["img"]; ?>" alt="jornal-LOGO">
            </span>
        </div>
    </header>
    <ul class="links-top">
        <li class="link-top"><a class="a" href="../index.php">Inicio</a></li>
    </ul>
    <main class="main" id="main">

        <h1 class="title"><?php echo $cat; ?></h1>

        <?php
        $code4 = "SELECT * FROM postagem WHERE categoria = '$cat'";
        $query4 = $mysqli->query($code4) or die("[ERROR]");
        $quant = $mysqli->affected_rows;
        echo "<div class=\"dm\" id=\"$cat\"><h1 class=\"title2\">" . $quant . "</h1> itens encontrados nesta categoria</div>";
        ?>

        <div class="posts">

            <?php
            $code2 = "SELECT * FROM postagem WHERE categoria = '$cat' ORDER BY id DESC";
            $query2 = $mysqli->query($code2) or die("[ERROR]");
            while ($dado2 = $query2->fetch_array()) {
                $id = $dado2["id"];
                $views = $dado2["views"];
            ?>
                <div class="post" onclick="<?php echo "javascript:location.href='../../PHP/index/aply2.php?id=$id&views=$views'"; ?>">
                    <input type="text" name="id" style="pointer-events: none; width: 0; height: 0;" value="<?php echo $dado2["id"]; ?>">
                    <div class="ct1">
                        <div class="sp">
                            <?php
                            if ($dado2["foto"][10] == 'V') {
                            ?>
                                <video autoplay muted loop src="<?php echo "../../PHP/index/" . $dado2["foto"]; ?>"></video>
                            <?php
                            } else if ($dado2["foto"][10] == 'I') {
                            ?>
                                <img src="<?php echo "../../PHP/index/" . $dado2["foto"]; ?>">
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
            <?php
            }
            ?>

        </div>

    </main>
    <footer class="footer">
        <p class="footer">Produção 100% Tech Whizzes<br>Todos os direiros reservados <a href="https://www.facebook.com/profile.php?id=61561000115418" target="_blank" style="color: #002244;"><em>Emanuel Domingos da Silva</em></a></p>
    </footer>
</body>

</html>