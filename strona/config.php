<?php
try{
    $db = new PDO('localhost;dbname=database','Admin','password');
}
catch (PDOException $e){
    die("Nie udało się polączyć z bazą!");
}
