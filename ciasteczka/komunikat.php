<?php
if (isset($_POST["akceptuj"])) {
    setcookie("komunikat", "zaakceptowano",
              time() + 86400 * 30, "/");

    header("Location: index.php");
    exit;
}
?>

<?php if (!isset($_COOKIE["komunikat"])): ?>

    <form method="post">
        <p>Witaj na naszej stronie!</p>
        <input type="submit" name="akceptuj"
               value="Rozumiem">
    </form>

<?php else: ?>

    <p>Komunikat został już zaakceptowany.</p>

<?php endif; ?>