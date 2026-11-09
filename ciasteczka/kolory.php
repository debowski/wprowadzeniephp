<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<?php
if (isset($_GET["kolor"])) {
    $kolor = $_GET["kolor"];

    $dozwolone = ["white", "lightblue", "lightgreen"];

    if (in_array($kolor, $dozwolone, true)) {
        setcookie("kolor", $kolor, time() + 86400 * 30, "/");
        header("Location: kolory.php");
        exit;
    }
}

$kolor = $_COOKIE["kolor"] ?? "white";

$dozwolone = ["white", "lightblue", "lightgreen"];

if (!in_array($kolor, $dozwolone, true)) {
    $kolor = "white";
}
?>

<body style="background-color: <?= htmlspecialchars($kolor) ?>">

<a href="?kolor=white">Biały</a>
<a href="?kolor=lightblue">Niebieski</a>
<a href="?kolor=lightgreen">Zielony</a>

</body>
</html>