<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nawiązywanie połączenia z bazą danych</title>
</head>

<body>

    <?php
    $host = "localhost";
    $user = "root";
    $password = "";
    $database = "ee09"; // Upewnij się, że ta baza istnieje


    /**
     * Wyświetla wyniki zapytania SQL w formie tabeli HTML
     * @param string $query Zapytanie SQL
     * @param mysqli_result $result Wynik zapytania
     * @return void
     */
    function displayData($query, $result) {
        if (mysqli_num_rows($result) > 0) {
            echo "<h2>Wyniki zapytania SQL:</h2>";
            echo "<table border='1' cellpadding='10'>";
            echo "<thead><tr>";
    
            foreach (mysqli_fetch_fields($result) as $field) {
                echo "<th>" . htmlspecialchars($field->name) . "</th>";
            }
    
            echo "</tr></thead><tbody>";
    
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                foreach ($row as $cell) {
                    echo "<td>" . htmlspecialchars($cell) . "</td>";
                }
                echo "</tr>";
            }
    
            echo "</tbody></table>";
        } else {
            echo "<p>Brak wyników do wyświetlenia.</p>";
        }
    }

    try {
        // Próba nawiązania połączenia
        $conn = mysqli_connect($host, $user, $password, $database);
        echo "Połączenie udane<br>";
    } catch (mysqli_sql_exception $e) {
        // Obsługa błędów i wyświetlanie komunikatu
        echo "Błąd połączenia: " . $e->getMessage();
    }



    
    $query = "SELECT * FROM lowisko WHERE 1";
    $result = mysqli_query($conn, $query);
    displayData($query, $result);



    














    // Zamknięcie połączenia, jeśli zostało nawiązane
    if ($conn) {
        mysqli_close($conn);
    }
    ?>




</body>

</html>