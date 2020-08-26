<?php
//Stworzenie bazy danych jesli nie istnieje
$servername = "localhost";
$username = "Admin";
$password = "password";

// laczenie sie z serwerem
$conn = new mysqli($servername, $username, $password);
// sprawdzenie polaczenia
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

// tworzenie bazy danych
$sql = "CREATE DATABASE esp";
if ($conn->query($sql) === TRUE) {
	echo "Database created successfully";
} else {
	echo "Error creating database: " . $conn->error;
}

$conn->close();

echo "<br>";
$servername = "localhostl";
$username = "Admin";
$password = "password";
$dbname = "database";

// laczenie z baza
$conn = new mysqli($servername, $username, $password, $dbname);
// sprawdzenie polaczenia
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

// poleceniem SQL tworzymy bazę danych
$sql = "CREATE TABLE logs (
	id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	temperatura VARCHAR(30),
	wilgotnosc VARCHAR(30),
	cisnienie VARCHAR(30),
	uwagi VARCHAR(50),
	`Date` DATE NULL,
	`Time` TIME NULL, 
	`TimeStamp` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
	)";

if ($conn->query($sql) === TRUE) {
	echo "Table logs created successfully";
} else {
	echo "Error creating table: " . $conn->error;
}
?>