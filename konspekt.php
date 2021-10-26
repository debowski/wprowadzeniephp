<!DOCTYPE html>
<html lang="pl" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>ble</title>
  </head>
  <body>
    <?php

      for ($i=1 ; $i <=20 ; $i++){

        if ($i%2 != 0)
          continue;
        echo 'liczba: '.$i.'<br>';
      }

     ?>
  </body>
</html>
