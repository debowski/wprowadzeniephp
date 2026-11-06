<?php

// ==========================================
// 1. POŁĄCZENIE Z BAZĄ DANYCH
// ==========================================

$polaczenie = mysqli_connect(
    "localhost",
    "root",
    "",
    "szkola"
);

// Sprawdzenie poprawności połączenia
if (!$polaczenie) {
    die("Błąd połączenia z bazą danych: " . mysqli_connect_error());
}

// Ustawienie kodowania znaków
mysqli_set_charset($polaczenie, "utf8mb4");


// ==========================================
// 2. OBSŁUGA FORMULARZA
// ==========================================

$komunikat = "";
$imie = "";
$nazwisko = "";
$wiek = "";
$plec = "";
$miasto = "";
$zainteresowania = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Pobranie danych z formularza
    $imie = trim($_POST["imie"]);
    $nazwisko = trim($_POST["nazwisko"]);
    $wiek = $_POST["wiek"];
    $plec = $_POST["plec"] ?? "";
    $miasto = $_POST["miasto"];
    
    // Pobranie zaznaczonych zainteresowań
    $lista_zainteresowan = $_POST["zainteresowania"] ?? [];

    // Zamiana tablicy na tekst
    $zainteresowania = implode(", ", $lista_zainteresowan);

    // Sprawdzenie wymaganych danych
    if ($imie != "" && $nazwisko != "") {

        // Zamiana wieku na liczbę lub NULL
        $wiek = ($wiek != "") ? (int)$wiek : null;

        // ==========================================
        // 3. ZAPISYWANIE DANYCH DO BAZY
        // ==========================================

        // Przygotowanie zapytania SQL
        $zapytanie = "INSERT INTO uczniowie
        (imie, nazwisko, wiek, plec, miasto, zainteresowania)
        VALUES (?, ?, ?, ?, ?, ?)";

        $wynik = mysqli_prepare($polaczenie, $zapytanie);

        if ($wynik) {

            // Przypisanie wartości do parametrów zapytania
            mysqli_stmt_bind_param(
                $wynik,
                "sissss",
                $imie,
                $nazwisko,
                $wiek,
                $plec,
                $miasto,
                $zainteresowania
            );

            // Wykonanie zapytania SQL
            if (mysqli_stmt_execute($wynik)) {
                $komunikat = "Dane zostały zapisane w bazie danych!";
            } else {
                $komunikat = "Błąd podczas zapisywania danych.";
            }

            // Zamknięcie zapytania
            mysqli_stmt_close($wynik);

        } else {
            $komunikat = "Błąd przygotowania zapytania SQL.";
        }

    } else {
        $komunikat = "Wypełnij wymagane pola!";
    }
}

// ==========================================
// 4. ZAMKNIĘCIE POŁĄCZENIA Z BAZĄ DANYCH
// ==========================================

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

    <!-- ==========================================
         5. FORMULARZ HTML
    ========================================== -->

    <form action="index.php" method="POST">

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


    <!-- ==========================================
         6. WYŚWIETLENIE KOMUNIKATU
    ========================================== -->

    <?php

    if ($komunikat != "") {
        echo "<h2>" . htmlspecialchars($komunikat) . "</h2>";
    }

    ?>


    <!-- ==========================================
         7. WYŚWIETLENIE PRZESŁANYCH DANYCH
    ========================================== -->

    <?php

    if ($_SERVER["REQUEST_METHOD"] == "POST" && $komunikat == "Dane zostały zapisane w bazie danych!") {

        echo "<h2>Otrzymane dane z formularza:</h2>";

        echo "Imię: " . htmlspecialchars($imie) . "<br>";
        echo "Nazwisko: " . htmlspecialchars($nazwisko) . "<br>";
        echo "Wiek: " . htmlspecialchars((string)($wiek ?? "")) . "<br>";
        echo "Płeć: " . htmlspecialchars($plec) . "<br>";
        echo "Miasto: " . htmlspecialchars($miasto) . "<br>";
        echo "Zainteresowania: " . htmlspecialchars($zainteresowania);

    }

    ?>

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
