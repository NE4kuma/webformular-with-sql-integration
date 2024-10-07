<?php
// database connection/ variables
$servername = "localhost";
$username = "webuser";
$password = "NS!?s+f";
$dbname = "formular_db";

// Enter form information
$name = $_POST['name'];
$message = $_POST['message'];

// Establishing a connection to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Verbindung fehlgeschlagen: " . $conn->connect_error);
}

// Prepare and execute SQL query
$sql = "INSERT INTO user_data (name, message) VALUES ('$name', '$message')";

if ($conn->query($sql) === TRUE) {
    echo "Daten erfolgreich gespeichert!";
} else {
    echo "Fehler: " . $sql . "<br>" . $conn->error;
}

// close connection
$conn->close();
?>
