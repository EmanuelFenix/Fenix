<?php
include "../../PHP/CONEXAO_PHP_DB/conexao.php";

$code1 = "SELECT * FROM jornal";
$query1 = $mysqli->query($code1) or die("[ERROR]");
$dado1 = $query1->fetch_array();

if (isset($_GET["view"]) && $_GET["view"] != "") {
    $cat = $_GET["view"];
} else {
    header("location: javascript:history.go(-1)");
}

$code2 = "SELECT * FROM postagem WHERE id = '$cat'";
$query2 = $mysqli->query($code2) or die("[ERROR]");
$dado2 = $query2->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../CSS/index.css">
    <link rel="icon" type="icon" href="<?php echo "../index/" . $dado1["img"]; ?>">
    <script defer src="../../JS/index.js"></script>
    <script defer src="../../JS/view.js"></script>
    <title>FÊNIX News | VIEW_<?php echo $dado2["titulo1"]; ?></title>
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
        <li class="link-top"><a class="a" href="javascript:history.go(-1)">Voltar</a></li>
    </ul>
    <main class="main" id="main">

        <div class="view">
            <?php
            if ($dado2["foto"][10] == 'V') {
            ?>
                <video class="sp_view" controls src="<?php echo "../index/" . $dado2["foto"]; ?>"></video>
            <?php
            } else if ($dado2["foto"][10] == 'I') {
            ?>
                <img class="sp_view" src="<?php echo "../index/" . $dado2["foto"]; ?>">
            <?php
            }
            ?>
            <div class="texto">
                <p style="display: flex; align-items: center; gap: 10px; color: #ff9999; max-width: 90%; overflow: hidden;"><?php echo "<strong class=\"title3\" style=\"font-size: 25px;\">" . $dado2["views"] . "</strong>"; ?> Visualizações</p>
                <h1 class="title"><?php echo $dado2["titulo1"]; ?></h1>
                <h1 class="title4"><?php echo nl2br($dado2["txt1"]); ?></h1>
                <br>
                <h1 class="title4"><?php echo nl2br($dado2["txt2"]); ?></h1>
            </div>
        </div>

    </main>
    <footer class="footer">
        <p class="footer">Produção 100% Tech Whizzes<br>Todos os direiros reservados <a href="https://www.facebook.com/profile.php?id=61561000115418" target="_blank" style="color: #002244;"><em>Emanuel Domingos da Silva</em></a></p>
    </footer>
</body>

</html>