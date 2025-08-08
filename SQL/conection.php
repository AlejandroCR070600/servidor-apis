<?php
$serverName = "192.168.254.206";
$connectionOptions = [
    "Database" => "PtoVta",
    "Uid" => "inventarios",
    "PWD" => "I177n12V18e16N01"
];

$conn = sqlsrv_connect($serverName, $connectionOptions);

if ($conn === false) {
    die(print_r(sqlsrv_errors(), true));
}


?>
