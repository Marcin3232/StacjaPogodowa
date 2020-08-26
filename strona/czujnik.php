
<?php

$servername = "localhost";
$username = "Admin ";
$password = "password";
$dbname = "database";

// łaczenie z baza
$conn = new mysqli($servername, $username, $password, $dbname);
// sprawdzenie polaczenia
if ($conn->connect_error) {
    die("Database Connection failed: " . $conn->connect_error);
    echo "Error";
}
//pobranie aktualnego czasu
date_default_timezone_set('Europe/Warsaw');
$d = date("Y-m-d");
$t = date("H:i:s");
$t2 = date("H:i");
$czujnik = "czujnik nr 1";
$st = (string)$t2;
$ciag = md5($czujnik);
$szefr = md5($st);
$szefr1 = $szefr;
$szefr1 .= $ciag;
$at = time();
if (!empty($_POST['temperatura'])) {

    $temperatura = $_POST['temperatura'];
    $wilgotnosc = $_POST['wilgotnosc'];
    $cisnienie = $_POST['cisnienie'];
    $ciag_arduino = $_POST['ciag'];
    $pomiar = $temperatura;
    $pomiar .= $wilgotnosc;
    $pomiar .= $cisnienie;
    //    if($ciag_arduino==$szefr1){

    $sql = "INSERT INTO logs (temperatura, wilgotnosc, cisnienie, Date, Time, mTime,czujnik)
		
		VALUES ('" . $temperatura . "', '" . $wilgotnosc . "','" . $cisnienie . "','" . $d . "', '" . $t . "','" . $at . "','" . $czujnik . "')";

    if ($conn->query($sql) === TRUE) {
        echo "OK";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "Error: Tego czujnika nie ma w bazie danych.!";

    // }
}


$conn->close();
?>