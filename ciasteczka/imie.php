<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    if (isset($_POST["imie"])) {
        $imie = trim($_POST["imie"]);
    
        if ($imie !== "") {
            setcookie("imie", $imie, time() + 86400 * 30, "/");
        }
    }
    
    if (isset($_COOKIE["imie"])) {
        echo "Witaj ponownie, " .
             htmlspecialchars($_COOKIE["imie"]);
    } else {
        echo "Witaj, podaj swoje imię.";
    }
    ?>
    
    <form method="post">
        <input type="text" name="imie">
        <input type="submit" value="Zapisz">
    </form>
    
</body>
</html>

