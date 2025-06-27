<?php
$servername = "localhost";
$username = "root"; // o el que uses
$password = "";     // tu contraseña si la tienes
$dbname = "hidroscan"; // el nombre de tu BD

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Conexión fallida: " . $conn->connect_error);
}
?>
 