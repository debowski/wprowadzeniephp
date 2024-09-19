### Skrypt do lekcji: **Tworzenie formularzy HTML i obsługa ich w PHP**

#### **1. Wprowadzenie do formularzy HTML**

- **Co to jest formularz?**
  Formularze w HTML pozwalają użytkownikom wprowadzać dane, które mogą być następnie przesyłane na serwer. Formularze mogą zawierać różne typy pól, takie jak pola tekstowe, przyciski radiowe, pola wyboru, itp.

- **Budowa formularza HTML:**
  Formularz w HTML zaczyna się od znacznika `<form>` i kończy się znacznikiem `</form>`. Najważniejsze atrybuty formularza to:
  - `action`: adres URL, do którego dane z formularza będą wysyłane.
  - `method`: sposób przesyłania danych (`GET` lub `POST`).

#### **2. Przykład prostego formularza HTML**

```html
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formularz rejestracyjny</title>
</head>
<body>
    <h2>Formularz rejestracyjny</h2>
    <form action="formularz.php" method="POST">
        <label for="name">Imię:</label>
        <input type="text" id="name" name="name" required><br><br>
        
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>
        
        <label for="password">Hasło:</label>
        <input type="password" id="password" name="password" required><br><br>
        
        <label for="gender">Płeć:</label><br>
        <input type="radio" id="male" name="gender" value="Mężczyzna">
        <label for="male">Mężczyzna</label><br>
        <input type="radio" id="female" name="gender" value="Kobieta">
        <label for="female">Kobieta</label><br><br>
        
        <input type="submit" value="Zarejestruj się">
    </form>
</body>
</html>
```

- **Opis formularza:**
  - Pole tekstowe dla imienia.
  - Pole typu `email` (które wymaga poprawnego formatu e-mail).
  - Pole typu `password` do wpisania hasła.
  - Przyciski radiowe dla wyboru płci.
  - Przycisk `submit` do wysłania formularza.

#### **3. Metody `GET` i `POST`**

- **GET:**
  - Dane są przesyłane przez URL (adres strony).
  - Używana w przypadku, gdy dane mogą być widoczne publicznie (np. wyszukiwanie).
  - Ograniczona liczba znaków do przesłania.

- **POST:**
  - Dane są przesyłane w treści zapytania HTTP.
  - Bezpieczniejsze dla danych wrażliwych (np. hasła).
  - Brak ograniczenia ilości przesyłanych danych.

#### **4. Obsługa formularza w PHP**

Kiedy formularz zostanie wysłany, dane mogą być odebrane w PHP za pomocą superglobalnych tablic `$_POST` lub `$_GET`. W naszym przykładzie używamy metody `POST`, więc dane będą dostępne w tablicy `$_POST`.

#### **5. Przykład skryptu PHP obsługującego formularz**

```php
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Odbieranie danych z formularza
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);
    $gender = htmlspecialchars($_POST['gender']);

    // Prosta walidacja
    if (empty($name) || empty($email) || empty($password)) {
        echo "Wszystkie pola są wymagane.";
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Niepoprawny format e-mail.";
    } else {
        // Wyświetlenie przesłanych danych
        echo "<h2>Dziękujemy za rejestrację!</h2>";
        echo "Imię: $name<br>";
        echo "Email: $email<br>";
        echo "Płeć: $gender<br>";
    }
} else {
    echo "Niepoprawne zapytanie.";
}
?>
```

- **Opis działania skryptu PHP:**
  - Używamy metody `$_SERVER['REQUEST_METHOD']`, aby sprawdzić, czy formularz został przesłany.
  - Dane przesyłane z formularza są odbierane za pomocą `$_POST`.
  - Stosujemy funkcję `htmlspecialchars()`, aby zabezpieczyć się przed atakami XSS (np. wprowadzenie złośliwego kodu HTML).
  - Walidujemy dane: sprawdzamy, czy pola nie są puste, i czy adres e-mail ma poprawny format.
  - Jeśli dane są poprawne, wyświetlamy przesłane informacje.

#### **6. Zabezpieczenia formularzy**

- **Walidacja po stronie serwera:**
  Zawsze waliduj dane po stronie serwera, aby uniknąć niepoprawnych lub niebezpiecznych danych.

- **Sanityzacja danych:**
  Używaj funkcji takich jak `htmlspecialchars()`, aby chronić aplikację przed atakami XSS.

#### **7. Ćwiczenia dla uczniów**

1. **Rozbuduj formularz:**
   - Dodaj dodatkowe pola, takie jak numer telefonu i datę urodzenia.
   - Zabezpiecz dane, sprawdzając, czy numer telefonu jest poprawny (tylko cyfry).
  
2. **Zadanie domowe:**
   - Stwórz formularz logowania, który przyjmuje nazwę użytkownika i hasło, a następnie wyświetla odpowiednią wiadomość na podstawie wprowadzonych danych.

#### **8. Podsumowanie**

- Formularze są kluczowym elementem interakcji między użytkownikiem a serwerem w aplikacjach webowych.
- Dane przesyłane z formularzy muszą być walidowane i odpowiednio przetwarzane po stronie serwera, aby zapewnić bezpieczeństwo i poprawność działania aplikacji.

#### **9. Zabezpieczenie skryptu przed automatycznym uruchomieniem po przeładowaniu strony**

Aby zabezpieczyć skrypt PHP w tym samym pliku co formularz HTML i upewnić się, że zostanie on wykonany dopiero po wciśnięciu przycisku **submit** oraz przesłaniu formularza, można skorzystać z warunku sprawdzającego, czy formularz został przesłany metodą POST (lub GET). W takim przypadku wykorzystujemy `$_SERVER['REQUEST_METHOD']` lub sprawdzamy, czy pole formularza (np. `$_POST['submit']`) zostało ustawione.

### Przykład:
1. **Sprawdzenie metody przesyłania formularza:**
   Można użyć `$_SERVER['REQUEST_METHOD']`, aby sprawdzić, czy formularz został przesłany metodą POST.

```php
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Skrypt wykona się dopiero po przesłaniu formularza
    $name = $_POST['name'];
    echo "Imię: " . htmlspecialchars($name);  // Wyświetlanie imienia po wciśnięciu submit
}
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Formularz</title>
</head>
<body>

<form method="POST" action="">
    <label for="name">Imię:</label>
    <input type="text" id="name" name="name" required>
    <button type="submit">Wyślij</button>
</form>

</body>
</html>
```

2. **Sprawdzenie konkretnego pola formularza (np. `$_POST['submit']`):**
   Można również sprawdzić, czy zmienna z przycisku submit istnieje, co oznacza, że formularz został przesłany.

```php
<?php
if (isset($_POST['submit'])) {
    // Skrypt wykona się dopiero po przesłaniu formularza
    $name = $_POST['name'];
    echo "Imię: " . htmlspecialchars($name);  // Wyświetlanie imienia po wciśnięciu submit
}
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Formularz</title>
</head>
<body>

<form method="POST" action="">
    <label for="name">Imię:</label>
    <input type="text" id="name" name="name" required>
    <button type="submit" name="submit">Wyślij</button>
</form>

</body>
</html>
```

### Dlaczego warto to zrobić?
1. **Bezpieczeństwo**: Skrypt nie wykona się automatycznie po załadowaniu strony, co mogłoby spowodować nieoczekiwane działanie.
2. **Czytelność**: Zabezpieczamy, że dane zostaną przetworzone dopiero, gdy formularz faktycznie zostanie przesłany.

### Dodatkowo:
- **`htmlspecialchars()`** użyte w przykładzie pomaga zabezpieczyć wyświetlane dane przed atakami typu XSS (Cross-Site Scripting).
