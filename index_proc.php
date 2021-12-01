<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $host ="localhost";
        $user = "root";
        $password ="";
        $database ="wedkowanie";

        //******************************
        //*** PODEJŚCIE PROCEDURALNE ***
        //******************************
        //połączenie z bazą
        $polaczenie = mysqli_connect($host, $user, $password, $database);
        
        //sprawdzenie połączenia
        if (!$polaczenie){
            die("Połączenie nieudane".mysqli_connect_error());
        }
        //echo "Wszystko działa";

        // kwarenda - tworzymy zapytanie
        $zapytanie = "SELECT marka, model, rocznik FROM samochody;";
        $zapytanie2 = "SELECT imie, nazwisko, wiek FROM uczniowie;";

        // do zmiennej wynik przypisuję to co zwraca zapytanie
        $wynik = mysqli_query($polaczenie, $zapytanie);
        $wynik2 = mysqli_query($polaczenie, $zapytanie2);

        if (mysqli_num_rows($wynik)>0){  // wypisz tylko jeśli istnieją jakies dane

            while ($wiersz = mysqli_fetch_row($wynik)){
                echo "marka: ".$wiersz[0]."\t"."model: ".$wiersz[1]."\t"."rocznik: ".$wiersz[2]."<br>";
            }

        }

        echo "<br><br><br><br>";

        //metoda fetch_assoc
        if (mysqli_num_rows($wynik2)>0){  // wypisz tylko jeśli istnieją jakies dane

            while ($wiersz = mysqli_fetch_assoc($wynik2)){
                echo "Imię: ".$wiersz["imie"]."\t"."Nazwisko: ".$wiersz["nazwisko"]."\t"."wiek: ".$wiersz["wiek"]."<br>";
            }

        } else echo "brak wyników"; 


        //zamknięcie połącznie
        mysqli_close($polaczenie);

    ?>
</body>
</html>