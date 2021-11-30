<!DOCTYPE html>
<html lang="pl" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Wprowadzenie do PHP</title>
  </head>
  <body>
    <?php

    $serwer = "localhost";
    $user = "root";
    $password ="";
    $baza = "wprowadzeniephp";

    //dane te można przenieść do oddzielnego pliku
    //require_once 'lacze.php'; //dane do logowania przeniesione do innego pliku

      $mysqli = new mysqli($serwer, $user, $password, $baza);

      //sprawdzenie połączenia:
      if ($mysqli -> connect_errno) {
        echo "Nie udało się połączyć z MySQL: ".$mysqli->connect_error;
        exit();
      }

      $sql = "SELECT id, imie, nazwisko, stanowisko FROM pracownicy";
      $wynik = $mysqli->query($sql);


      ?>

      <h1>Nauczyciele</h1>
      <table>
        <tr>
          <th>id</th>
          <th>Imię</th>
          <th>Nazwisko</th>
          <th>Stanowisko</th>
        </tr>

        <?php
        if ($wynik->num_rows > 0){
          while ($rekord = $wynik->fetch_assoc()){
            echo "<tr>";
            echo "<td>".$rekord["id"]."</td>";
            echo "<td>".$rekord["imie"]."</td>";
            echo "<td>".$rekord["nazwisko"]."</td>";
            echo "<td>".$rekord["stanowisko"]."</td>";
            echo "</tr>";
          }

        } else {echo "brak wyników";}

        ?>
      </table>




      <?php $mysqli->close(); ?>

  </body>
</html>
