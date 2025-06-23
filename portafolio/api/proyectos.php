<?php
require_once "config.php";

$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case 'GET':
        if (isset($_GET['id'])) {
            $stmt = $conn->prepare("SELECT * FROM proyectos WHERE id = ?");
            $stmt->execute([$_GET['id']]);
            $data = $stmt->fetch(PDO::FETCH_ASSOC);
            echo json_encode($data ?: ["error" => "No encontrado"]);
        } else {
            $stmt = $conn->query("SELECT * FROM proyectos");
            echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
        }
        break;

    case 'POST':
        $input = json_decode(file_get_contents("php://input"), true);
        $stmt = $conn->prepare("INSERT INTO proyectos (titulo, descripcion) VALUES (?, ?)");
        $ok = $stmt->execute([$input['titulo'], $input['descripcion']]);
        echo json_encode(["success" => $ok]);
        break;

    case 'PUT':
        parse_str(file_get_contents("php://input"), $input);
        $stmt = $conn->prepare("UPDATE proyectos SET titulo = ?, descripcion = ? WHERE id = ?");
        $ok = $stmt->execute([$input['titulo'], $input['descripcion'], $input['id']]);
        echo json_encode(["success" => $ok]);
        break;

    case 'DELETE':
        parse_str(file_get_contents("php://input"), $input);
        $stmt = $conn->prepare("DELETE FROM proyectos WHERE id = ?");
        $ok = $stmt->execute([$input['id']]);
        echo json_encode(["success" => $ok]);
        break;

    default:
        http_response_code(405);
        echo json_encode(["error" => "Método no permitido"]);
        break;
}
