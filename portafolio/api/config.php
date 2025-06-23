<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");

$host = "teclab.uct.cl";
$db_name = "j_estrada_db1";
$username = "j_estrada";
$password = "j_estrada2025";

try {
    $conn = new PDO("mysql:host=$host;dbname=$db_name;charset=utf8", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $exception) {
    echo json_encode(["error" => "Conexión fallida: " . $exception->getMessage()]);
    exit;
}
?>
