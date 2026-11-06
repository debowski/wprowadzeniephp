
<!-- Uwaga dotycząca bezpieczeństwa i kompletności: 
ten przykład ma charakter dydaktyczny. 
W rzeczywistej aplikacji należy dodatkowo walidować dane po stronie PHP, 
w szczególności wiek, płeć, miasto oraz zawartość tablicy zainteresowań. 
Samo required w HTML nie zastępuje walidacji serwerowej. -->


<?php

// 1. POŁĄCZENIE Z BAZĄ DANYCH

$polaczenie = mysqli_connect("localhost", "root", "", "szkola");

if (!$polaczenie) {
    die("Błąd połączenia z bazą danych");
}

mysqli_set_charset($polaczenie, "utf8mb4");


// 2. OBSŁUGA FORMULARZA

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Pobranie danych z formularza
    $imie = $_POST["imie"];
    $nazwisko = $_POST["nazwisko"];
    $wiek = $_POST["wiek"];
    $plec = $_POST["plec"];
    $miasto = $_POST["miasto"];

    // Pobranie zainteresowań
    $zainteresowania = $_POST["zainteresowania"] ?? [];

    // Zamiana tablicy na tekst
    $zainteresowania = implode(", ", $zainteresowania);


    // 3. ZAPIS DANYCH DO BAZY

    $zapytanie = "INSERT INTO uczniowie
    (imie, nazwisko, wiek, plec, miasto, zainteresowania)
    VALUES
    ('$imie', '$nazwisko', '$wiek', '$plec', '$miasto', '$zainteresowania')";

    $wynik = mysqli_query($polaczenie, $zapytanie);


    // 4. SPRAWDZENIE WYNIKU ZAPYTANIA

    if ($wynik) {
        echo "<h2>Dane zostały zapisane!</h2>";
    } else {
        echo "<h2>Błąd zapisu danych!</h2>";
    }

    
    
    
    // 5. WYŚWIETLENIE POBRANYCH DANYCH
    
    echo "Imię: " . htmlspecialchars($imie) . "<br>";
    echo "Nazwisko: " . htmlspecialchars($nazwisko) . "<br>";
    echo "Wiek: " . htmlspecialchars($wiek) . "<br>";
    echo "Płeć: " . htmlspecialchars($plec) . "<br>";
    echo "Miasto: " . htmlspecialchars($miasto) . "<br>";
    echo "Zainteresowania: " . htmlspecialchars($zainteresowania) . "<br>";
    
    if ($wynik) {
        header("Location: index2.php?status=ok");
        exit();
    }
    }
    
    
// 6. ZAMKNIĘCIE POŁĄCZENIA

mysqli_close($polaczenie);

?>

<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formularz danych osobowych</title>
</head>

<body>

    <h1>Formularz danych osobowych</h1>

    <form action="index2.php" method="POST">

        <label for="imie">Imię:</label>
        <input type="text" name="imie" id="imie" required>

        <br><br>

        <label for="nazwisko">Nazwisko:</label>
        <input type="text" name="nazwisko" id="nazwisko" required>

        <br><br>

        <label for="wiek">Wiek:</label>
        <input type="number" name="wiek" id="wiek" min="1" max="120">

        <br><br>

        <p>Płeć:</p>

        <input type="radio" name="plec" value="Kobieta" id="kobieta">
        <label for="kobieta">Kobieta</label>

        <input type="radio" name="plec" value="Mężczyzna" id="mezczyzna">
        <label for="mezczyzna">Mężczyzna</label>

        <br><br>

        <label for="miasto">Miasto:</label>

        <select name="miasto" id="miasto">
            <option value="Katowice">Katowice</option>
            <option value="Gliwice">Gliwice</option>
            <option value="Mikołów">Mikołów</option>
            <option value="Łaziska Górne">Łaziska Górne</option>
        </select>

        <br><br>

        <p>Zainteresowania:</p>

        <input type="checkbox" name="zainteresowania[]" value="Informatyka" id="informatyka">
        <label for="informatyka">Informatyka</label>

        <br>

        <input type="checkbox" name="zainteresowania[]" value="Sport" id="sport">
        <label for="sport">Sport</label>

        <br>

        <input type="checkbox" name="zainteresowania[]" value="Muzyka" id="muzyka">
        <label for="muzyka">Muzyka</label>

        <br>

        <input type="checkbox" name="zainteresowania[]" value="Podróże" id="podroze">
        <label for="podroze">Podróże</label>

        <br><br>

        <input type="submit" value="Wyślij formularz">

        <input type="reset" value="Wyczyść">

    </form>

</body>
</html>
<?php

// Tworzenie bazy danych i tabeli w MySQL


// Utwórz bazę danych o nazwie szkola, a następnie wykonaj poniższe zapytanie SQL.

// CREATE DATABASE szkola
// CHARACTER SET utf8mb4
// COLLATE utf8mb4_polish_ci;

// USE szkola;

// CREATE TABLE uczniowie (
//     id INT AUTO_INCREMENT PRIMARY KEY,
//     imie VARCHAR(40) NOT NULL,
//     nazwisko VARCHAR(60) NOT NULL,
//     wiek INT,
//     plec VARCHAR(20),
//     miasto VARCHAR(50),
//     zainteresowania TEXT
// );


?>
