<!DOCTYPE html>
<html lang="pl" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Równanie kwadratowe</title>
  </head>
  <body>
    <?php
    $a = 3;
    $b = 5;
    $c = 1;
    $x1 = 0;
    $x2 = 0;
    $delta = 0;
    $delta = pow($b,2)-4*$a*$c;
    echo 'delta wynosi: '.$delta.'<br>';



    if ( $delta > 0 ){
      echo 'x1: '.$x1 = (-$b - sqrt($delta))/(2*$a).'<br>';
      echo 'x2: '.$x2 = (-$b + sqrt($delta))/(2*$a).'<br>';
    }
    else if ( $delta === 0 ) {
      echo "x1=x2: ". $x1 = (-$b)/(2*$a)."<br>";
    }
    else {
      echo "Brak miejsc zerowych!<br>";
    }
     ?>
  </body>
</html>
