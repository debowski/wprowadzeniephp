<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <form action="test.php" method="post">
        liczba 1: <input type="number" name="liczba1"><br>
        liczba 2: <input type="number" name="liczba2"><br>
        <input type="submit" name="Wyslij" value="Prześlij">
    </form>

<?php 
    $a=$_POST['liczba1'];
    $b=$_POST['liczba2'];

    echo "Dla liczb $a oraz $b <br>";
    echo "Suma: ".($a+$b)."<br>"; 
    echo "Różnica: ".($a-$b)."<br>"; 
    echo "Iloczyn: ".($a*$b)."<br>"; 
    echo "Iloraz: ".($a/$b)."<br>"; 
?>




</body>
</html>