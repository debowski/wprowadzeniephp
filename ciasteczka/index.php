
<?php
// Sprawdzenie, czy cookie istnieje
if (isset($_COOKIE["odwiedziny"])) {
    $liczba = (int)$_COOKIE["odwiedziny"] + 1;
} else {
    $liczba = 1;
}

// Zapisanie nowej wartości na 30 dni
setcookie("odwiedziny", (string)$liczba, time() + (30 * 24 * 3600), "/");

// Zerowanie licznika
if (isset($_GET["reset"])) {
    setcookie("odwiedziny", "", time() - 3600, "/");
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Cookies - licznik odwiedzin</title>
</head>
<body>

<h1>Licznik odwiedzin</h1>

<?php
if ($liczba == 1) {
    echo "<p>Witaj! Odwiedzasz nas pierwszy raz.</p>";
} else {
    echo "<p>To Twoja " . $liczba . " wizyta.</p>";
}
?>

<a href="index.php?reset=1">Wyzeruj licznik</a>

</body>
</html>
