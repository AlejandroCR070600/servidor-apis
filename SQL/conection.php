<?php

$serverName = "localhost";
$connectionOptions = [
    "Database" => "barcodes",
    "UID" => "adminweb",
    "PWD" => "123456"
];

// Conectar al servidor
$conn = sqlsrv_connect($serverName, $connectionOptions);

if ($conn === false) {
    die(print_r(sqlsrv_errors(), true));
}




?>
