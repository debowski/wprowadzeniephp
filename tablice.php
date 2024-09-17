
<?php


//tablica w PHP
$carBrands = ['Toyota', 'Ford', 'BMW', 'Mercedes', 'Audi', 'Volkswagen', 'Honda', 'Hyundai', 'Nissan', 'Chevrolet'];
print_r($carBrands);

// tablica asocjacyjna w PHP
$people = [
    ['imie' => 'Jan', 'nazwisko' => 'Kowalski', 'email' => 'jan.kowalski@example.com'],
    ['imie' => 'Anna', 'nazwisko' => 'Nowak', 'email' => 'anna.nowak@example.com'],
    ['imie' => 'Piotr', 'nazwisko' => 'Wiśniewski', 'email' => 'piotr.wisniewski@example.com'],
    ['imie' => 'Katarzyna', 'nazwisko' => 'Wójcik', 'email' => 'katarzyna.wojcik@example.com'],
    ['imie' => 'Marek', 'nazwisko' => 'Kowalczyk', 'email' => 'marek.kowalczyk@example.com'],
    ['imie' => 'Ewa', 'nazwisko' => 'Mazur', 'email' => 'ewa.mazur@example.com'],
    ['imie' => 'Tomasz', 'nazwisko' => 'Zieliński', 'email' => 'tomasz.zielinski@example.com'],
    ['imie' => 'Agnieszka', 'nazwisko' => 'Dąbrowska', 'email' => 'agnieszka.dabrowska@example.com'],
    ['imie' => 'Paweł', 'nazwisko' => 'Lewandowski', 'email' => 'pawel.lewandowski@example.com'],
    ['imie' => 'Monika', 'nazwisko' => 'Szymańska', 'email' => 'monika.szymanska@example.com'],
    ['imie' => 'Rafał', 'nazwisko' => 'Kamiński', 'email' => 'rafal.kaminski@example.com'],
    ['imie' => 'Magdalena', 'nazwisko' => 'Kubiak', 'email' => 'magdalena.kubiak@example.com'],
    ['imie' => 'Grzegorz', 'nazwisko' => 'Pawlak', 'email' => 'grzegorz.pawlak@example.com'],
    ['imie' => 'Joanna', 'nazwisko' => 'Krawczyk', 'email' => 'joanna.krawczyk@example.com'],
    ['imie' => 'Karol', 'nazwisko' => 'Nowicki', 'email' => 'karol.nowicki@example.com'],
    ['imie' => 'Dorota', 'nazwisko' => 'Jankowska', 'email' => 'dorota.jankowska@example.com'],
    ['imie' => 'Kamil', 'nazwisko' => 'Sikora', 'email' => 'kamil.sikora@example.com'],
    ['imie' => 'Barbara', 'nazwisko' => 'Wróbel', 'email' => 'barbara.wrobel@example.com'],
    ['imie' => 'Łukasz', 'nazwisko' => 'Górski', 'email' => 'lukasz.gorski@example.com'],
    ['imie' => 'Aleksandra', 'nazwisko' => 'Król', 'email' => 'aleksandra.krol@example.com'],
];


/*

print_r() jest bardziej czytelne dla człowieka, ale nie pokazuje szczegółów typów danych.
var_dump() dostarcza pełniejsze informacje, w tym o typie danych i ich długości, ale jego wynik może być mniej czytelny, szczególnie przy większych strukturach danych.

*/

// print_r($people);
// print_r($people[1]['email']);

echo '<br>';
// var_dump($people);



// Zwraca wynik jako string
$wynik = print_r($people, true);

// Wyświetla sformatowany wynik
echo "<pre>$wynik</pre>";


//pętla wypisująca każdy element tablicy jako element listy ol
echo '<ol>';

foreach ($people as $ludz) {
    echo "<li>" . $ludz['imie'] . ' ' . $ludz['nazwisko'] . "</li>";
}

echo '</ol>';

?>