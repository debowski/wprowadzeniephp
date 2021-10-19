<!DOCTYPE html>
<html lang="pl" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>IF / ELSE IF / ELSE</title>
  </head>
  <body>
    <h1>IF / ELSE IF / ELSE</h1>
    <?php
      $temperatura = 40;

      if ($temperatura == 36.6) {
        echo "Jesteś zdrowy<br>";
      }
      else if ($temperatura == 21) {
          echo "Jesteś martwy zombiaku<br>";
      }
      else if ($temperatura < 20) {
        echo "Jesteś wompierzem!<br>";
      }
      else {
        echo "Masz goroczkę!!! Umierasz! Wezwij grabarza<br>";
      }



     ?>
  </body>
</html>
