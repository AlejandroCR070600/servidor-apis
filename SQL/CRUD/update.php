<?
require "../conection.php";
function actualizarUsuario($conn, $id, $nombre, $email) {
    $sql = "UPDATE usuarios SET nombre = ?, email = ? WHERE id = ?";
    $params = [$nombre, $email, $id];

    $stmt = sqlsrv_query($conn, $sql, $params);
    if ($stmt === false) {
        die(print_r(sqlsrv_errors(), true));
    }
    echo "Usuario actualizado correctamente.";
}
?>