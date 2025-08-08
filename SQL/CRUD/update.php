<?php
header('Content-Type: application/json');
require "../conection.php";

if($_SERVER['REQUEST_METHOD']==='POST'){
    
     $value=json_decode(file_get_contents('php://input'));
     updateDatos($value->existFisicasTot, $value->codInterno);
    
}

function updateDatos($existFisicaTot, $codigo){
    global $conn;
    $sql="update ProductoFarma set ExistFisicaTot = ? where Codigo= ?";
    $params=[$existFisicaTot, $codigo];
    $stmt=sqlsrv_query($conn,$sql,$params);
    if($stmt===false){
         $datosE=['MENSAJE'=>'ERROR EN LA CONSULTA']; 
    echo json_encode($datosE);
    return;
    }

    $fila = sqlsrv_rows_affected($stmt);

    if($fila===false){
        $datosE = ['MENSAJE' => 'NO SE PUDO OBTENER LAS FILAS AFECTADAS'];
    echo json_encode($datosE);
    }elseif($fila=== 0){
        $datosE = ['MENSAJE' => 'NO SE ACTUALIZÓ NINGÚN REGISTRO'];
    echo json_encode($datosE);
    }else{
         $datosE = ['MENSAJE' => 'ACTUALIZACIÓN EXITOSA', 'FILAS_AFECTADAS' => $fila];
    echo json_encode($datosE);
    }
}

?>