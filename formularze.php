<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Formularz Kontaktowy</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Formularz Kontaktowy</h1>
        <form action="#" method="post">
            <label for="name">Imię i nazwisko:</label>
            <input type="text" id="name" name="name" placeholder="Twoje imię" required>

            <label for="email">Adres e-mail:</label>
            <input type="email" id="email" name="email" placeholder="Twój e-mail" required>

            <label for="password">Hasło:</label>
            <input type="password" id="password" name="password" placeholder="Twoje hasło" required>

            <label for="message">Wiadomość:</label>
            <textarea id="message" name="message" placeholder="Twoja wiadomość" required></textarea>

            <input type="submit" value="Wyślij">
        </form>

        <footer>
            <p>Strona stworzona przez <a href="#">Piotr Dębowski</a></p>
        </footer>
    </div>
</body>
</html>
