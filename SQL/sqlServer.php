<?php
// Archivo de stubs para que VS Code/Intelephense reconozca las funciones sqlsrv

function sqlsrv_connect($serverName, $connectionOptions) {}
function sqlsrv_query($conn, $query, $params = null, $options = null) {}
function sqlsrv_fetch_array($stmt, $fetchType = null, $row = null) {}
function sqlsrv_num_rows($stmt) {}
function sqlsrv_free_stmt($stmt) {}
function sqlsrv_close($conn) {}
function sqlsrv_errors($errorsOrWarnings = null) {}
function sqlsrv_prepare($conn, $query, $params = null, $options = null) {}
function sqlsrv_execute($stmt) {}

if (!defined('SQLSRV_FETCH_ASSOC')) {
    define('SQLSRV_FETCH_ASSOC', 2);
}
if (!defined('SQLSRV_FETCH_NUMERIC')) {
    define('SQLSRV_FETCH_NUMERIC', 1);
}
if (!defined('SQLSRV_FETCH_BOTH')) {
    define('SQLSRV_FETCH_BOTH', 4);
}
if (!defined('SQLSRV_PHPTYPE_STRING')) {
    define('SQLSRV_PHPTYPE_STRING', -8);
}

?>