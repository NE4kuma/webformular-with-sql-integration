<?php
// Datenbankverbindung
$servername = "localhost";
$username = "webuser";
$password = "dein_passwort";
$dbname = "formular_db";

// Formularinformationen erfassen
$name = $_POST['name'];
$message = $_POST['message'];

// Verbindung zur Datenbank herstellen
$conn = new mysqli($servername, $username, $password, $dbname);

// Verbindung überprüfen
if ($conn->connect_error) {
    die("Verbindung fehlgeschlagen: " . $conn->connect_error);
}

// SQL-Abfrage vorbereiten und ausführen
$sql = "INSERT INTO user_data (name, message) VALUES ('$name', '$message')";

if ($conn->query($sql) === TRUE) {
    echo "Daten erfolgreich gespeichert!";
} else {
    echo "Fehler: " . $sql . "<br>" . $conn->error;
}

// Verbindung schließen
$conn->close();
?>

