<?php
function eliminarUsuario($conn, $id) {
    $sql = "DELETE FROM usuarios WHERE id = ?";
    $params = [$id];

    $stmt = sqlsrv_query($conn, $sql, $params);
    if ($stmt === false) {
        die(print_r(sqlsrv_errors(), true));
    }
    echo "Usuario eliminado correctamente.";
}
?>