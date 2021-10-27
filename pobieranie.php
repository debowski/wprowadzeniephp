<!DOCTYPE html>
<html lang="pl" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Pobieranie danych z bazy</title>
  </head>
  <body>
  <?php
    $serwer = "localhost";
    $user = "root";
    $password ="";
    $baza = "wedkowanie";

    $mysqli = new mysqli($serwer, $user, $password, $baza);

    //sprawdzenie połączenia:
    if ($mysqli -> connect_errno) {
      echo "Nie udało się połączyć z MySQL: ".$mysqli->connect_error;
      exit();
    }
$zapytanie1 = 'SELECT `id`,`nazwa`,`wystepowanie`,`styl_zycia`  FROM `ryby` WHERE 1 ;';
$wynik1 = $mysqli->query($zapytanie1);
$wynik2 = $mysqli->query($zapytanie1);

//skrypt 0


//skrypt 1
echo '<h2>skrypt 2 - fetch_assoc()<br></h2>';
echo '<ul>';
if ($wynik1->num_rows > 0){
    while ($rekord = $wynik1->fetch_assoc()){
      echo "<li>".$rekord["id"]."&nbsp;".$rekord["nazwa"]."&nbsp;".$rekord["wystepowanie"]."</li>";
    }
  }
echo '</ul>';
//skrypt 2

echo '<h2>skrypt 2 - fetch_row()<br></h2>';
echo '<ul>';
        if ($wynik2->num_rows > 0){
          while ($rekord = $wynik2 -> fetch_row()){
            echo "<li>".$rekord[1]."&nbsp;".$rekord[2]."</li>";
          }
        }
echo '</ul>';




 ?>

   <?php
    $mysqli->close();
    ?>

  </body>
</html>
