<?php
require "../conection.php";
header("Content-Type: application/json");

echo obtenerUsuarios();

function obtenerUsuarios() {
    global $conn;
    $sql = "SELECT * FROM barcode";
    $stmt = sqlsrv_query($conn, $sql);
    if ($stmt === false) {
        http_response_code(500); // Opcional: establece código de error HTTP
        echo json_encode(["error" => sqlsrv_errors()], JSON_PRETTY_PRINT);
        exit();
    }

    $usuarios = [];
    while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
        $usuarios[] = $row;
    }
    return json_encode($usuarios);
}

?>