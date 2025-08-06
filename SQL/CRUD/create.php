<?php
require "../conection.php";

if($_SERVER['REQUEST_METHOD']==='POST'){
    $value=json_decode(file_get_contents(('php://input')));

    
    
    if($value->request==='POSTDATES'){
    $buscador= buscar($value->barcode);
    }

    if($buscador===true){
      $datosE=['MENSAJE'=>'SI EXISTE EL PRODUCTO']; 
        echo json_encode($datosE);

    }else{
        crearUsuario($value->barcode);

    }
    
    //echo json_encode($value);
//    crearUsuario($value->barcode);
}
function buscar($barcode){
    global $conn;
    if($barcode===null){
        $datosE=['MENSAJE'=>'ALGO ES NULO']; 
        echo json_encode($datosE);
    return;
    }
    $sql="SELECT * from barcode where barcode=?";
    $params=[$barcode];
    $stmt=sqlsrv_query($conn,$sql,$params);
    if($stmt===false){
    $datosE=['MENSAJE'=>'ERROR EN LA CONSULTA']; 
    echo json_encode($datosE);
    return;
    }   
    if($row=sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)){
        return true;
} else {
    return false;
}

}
function crearUsuario($barcode) {
    global $conn;
    if($barcode === null ){
         $datosE=['MENSAJE'=>'ALGO ES NULO']; 
    echo json_encode($datosE);
    return;
    }
    $sql = "INSERT INTO barcode (barcode) VALUES (?)";
    $params = [$barcode];
    

    $stmt = sqlsrv_query($conn, $sql, $params);
    if ($stmt === false) {
        $datosE=['MENSAJE'=> sqlsrv_errors()]; 
        echo json_encode($datosE);
        return;
        
    }else{
   $datosE=['MENSAJE'=>'USUARIO CREADO CORRECTAMENTE']; 
    echo json_encode($datosE);
    }
 
}
?>