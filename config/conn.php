<?php
$host = "localhost";
$user = "root";
$pass = "Px2kTavo2022";
$port = "3306";
$dbname = "Impartech";

try {
    $conn = new PDO("mysql:host=$host;port=$port;dbname=$dbname;", $user, $pass);
    //echo "conexão feita com sucesso";
} catch (PDOException $e) {
    echo "Connection failed:" . $e->getMessage();
}
