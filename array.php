<!DOCTYPE html>
<html lang="pl" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

<?php
$tab1 = array ('b'=>'608', 'a'=>'Chamade', 'c'=>'Picasso');
$tab1['e']='Piotr';
$tab1['d']='Dębowski';

print_r ($tab1);
echo '<br>';

asort ($tab1);
reset ($tab1);
print_r ($tab1);
echo '<br>';

ksort ($tab1);
reset ($tab1);
print_r ($tab1);
?>

  </body>
</html>
