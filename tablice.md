### Temat: Funkcje dotyczące tablic w języku PHP

**Cele lekcji:**
1. Zrozumienie, czym są tablice w PHP i jak działają.
2. Poznanie najczęściej stosowanych funkcji do obsługi tablic.
3. Praktyczne zastosowanie funkcji na tablicach.

---

### 1. **Wprowadzenie do tablic**

Tablice są jednym z najważniejszych typów danych w PHP. Pozwalają przechowywać wiele wartości pod jednym indeksem. Możemy dzielić je na:
- **Tablice indeksowane** – klucze to liczby całkowite (zaczynające się od zera),
- **Tablice asocjacyjne** – klucze to ciągi znaków,
- **Tablice wielowymiarowe** – tablice wewnątrz innych tablic.

#### Przykład tablicy indeksowanej:
```php
$owoce = array("Jabłko", "Banan", "Gruszka");
```

#### Przykład tablicy indeksowanej:
```php
$owoce = ["Jabłko", "Banan", "Gruszka"];
```


#### Przykład tablicy asocjacyjnej:
```php
$osoba = array(
  "imie" => "Jan",
  "nazwisko" => "Kowalski",
  "wiek" => 30
);
```




### 2. **Najczęściej stosowane funkcje do obsługi tablic**

#### a) `array_push()` – dodawanie elementów na końcu tablicy
Dodaje jeden lub więcej elementów na koniec tablicy.

**Przykład:**
```php
$owoce = array("Jabłko", "Banan");
array_push($owoce, "Gruszka", "Pomarańcza");
// Wynik: $owoce = ["Jabłko", "Banan", "Gruszka", "Pomarańcza"]
```

#### b) `array_pop()` – usuwanie elementu z końca tablicy
Usuwa i zwraca ostatni element tablicy.

**Przykład:**
```php
$owoce = array("Jabłko", "Banan", "Gruszka");
$ostatni_owoc = array_pop($owoce);
// Wynik: $owoce = ["Jabłko", "Banan"], $ostatni_owoc = "Gruszka"
```

#### c) `array_shift()` – usuwanie pierwszego elementu z tablicy
Usuwa i zwraca pierwszy element tablicy.

**Przykład:**
```php
$owoce = array("Jabłko", "Banan", "Gruszka");
$pierwszy_owoc = array_shift($owoce);
// Wynik: $owoce = ["Banan", "Gruszka"], $pierwszy_owoc = "Jabłko"
```

#### d) `array_unshift()` – dodawanie elementów na początek tablicy
Dodaje jeden lub więcej elementów na początek tablicy.

**Przykład:**
```php
$owoce = array("Banan", "Gruszka");
array_unshift($owoce, "Jabłko");
// Wynik: $owoce = ["Jabłko", "Banan", "Gruszka"]
```

#### e) `count()` – liczenie elementów w tablicy
Zwraca liczbę elementów w tablicy.

**Przykład:**
```php
$owoce = array("Jabłko", "Banan", "Gruszka");
$liczba_owocow = count($owoce);
// Wynik: 3
```

#### f) `in_array()` – sprawdzanie, czy wartość istnieje w tablicy
Zwraca `true` lub `false` w zależności od tego, czy wartość istnieje w tablicy.

**Przykład:**
```php
$owoce = array("Jabłko", "Banan", "Gruszka");
$czy_istnieje = in_array("Banan", $owoce);
// Wynik: true
```

#### g) `array_merge()` – łączenie dwóch lub więcej tablic
Łączy dwie lub więcej tablic w jedną.

**Przykład:**
```php
$owoce1 = array("Jabłko", "Banan");
$owoce2 = array("Gruszka", "Pomarańcza");
$polaczone_owoce = array_merge($owoce1, $owoce2);
// Wynik: $polaczone_owoce = ["Jabłko", "Banan", "Gruszka", "Pomarańcza"]
```

#### h) `array_keys()` – pobieranie kluczy z tablicy
Zwraca wszystkie klucze z tablicy.

**Przykład:**
```php
$osoba = array(
  "imie" => "Jan",
  "nazwisko" => "Kowalski",
  "wiek" => 30
);
$klucze = array_keys($osoba);
// Wynik: $klucze = ["imie", "nazwisko", "wiek"]
```

#### i) `array_values()` – pobieranie wartości z tablicy
Zwraca wszystkie wartości z tablicy.

**Przykład:**
```php
$osoba = array(
  "imie" => "Jan",
  "nazwisko" => "Kowalski",
  "wiek" => 30
);
$wartosci = array_values($osoba);
// Wynik: $wartosci = ["Jan", "Kowalski", 30]
```

### 3. **Zadanie praktyczne**

Stwórz tablicę asocjacyjną o nazwie `$samochody`, gdzie kluczami będą marki, a wartościami modele samochodów. Następnie wykonaj poniższe operacje:
1. Dodaj nowy samochód do tablicy.
2. Usuń jeden z samochodów.
3. Sprawdź, ile samochodów znajduje się w tablicy.
4. Sprawdź, czy w tablicy znajduje się określona marka samochodu.
5. Wyświetl wszystkie marki i modele.

---

### 4. **Podsumowanie**
Podczas tej lekcji poznaliśmy kilka podstawowych funkcji do obsługi tablic w PHP. Są to narzędzia, które ułatwiają manipulację danymi i ich organizację. Opanowanie ich pozwoli na bardziej efektywną pracę z tablicami w przyszłych projektach.