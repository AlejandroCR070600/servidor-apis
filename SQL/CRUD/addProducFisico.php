<?php
require "../conection.php";

$value=json_decode(file_get_contents("php://input"));
if($_SERVER['REQUEST_METHOD']==='POST'){
    if($value->request==='addProducFisico'){
        //echo json_encode($value);
        
        $codigoInt=$value->codigoInt;
        $cantFisicaTot=$value->cantFisicaTot;
        $cantTeoExis=$value->canTotalTeo;
        $descripcion =$value->descripcion;
    }

}



$sql= "SELECT * from tempinvescaneados (NOLOCK) where codigoint= ?";
$params=[$codigoInt];
$stmt=sqlsrv_query($conn,$sql,$params);

$primero=0;
$CantUltimoEsc=0;

if($stmt===false){
    $mensaje= "fallo el sql";
    $status=false;

}else{

    if (!sqlsrv_has_rows($stmt)) {
          $sql ="INSERT INTO TempInvEscaneados(codigoint) values (?)";
        $params=[$codigoInt];
        $stmt=sqlsrv_query($conn,$sql,$params);
        if($stmt === false){
            $mensaje = "Error al insertar en TempInvEscaneadosDif";
            $status=false;
        }else{
        if($cantTeoExis <> $cantFisicaTot){
            $diferencia=$cantTeoExis - $cantFisicaTot;
            $sql="INSERT into TempInvEscaneadosDif (codigoint, Diferencia) values (?,?)";
            $params=[$codigoInt, $diferencia];
            $stmt=sqlsrv_query($conn,$sql, $params);
            if($stmt===false){
                $mensaje = die(print_r(sqlsrv_errors(),true));
            }else{
                $mensaje= "registrado correctamente";
                $status=true;
            }
        }
    }
    } else {
        
       
        $diferencia=$cantTeoExis - $cantFisicaTot;
        $sql="INSERT into TempInvEscaneadosDif (codigoint, Diferencia) values (?,?)";
            $params=[$codigoInt, $diferencia];
            $stmt=sqlsrv_query($conn,$sql, $params);
        if($cantFisicaTot ===0 || $cantFisicaTot==="" || is_null($cantFisicaTot)){

        }else{
            $CantUltimoEsc= -1 * $cantFisicaTot;
            $mensaje="Realizado Correctamente";
            $status=true;
        }

}

$datosE=['CodUltimoEsc'=>$value->codigoInt,
'TextUltimoEsc'=>$value->descripcion,
'TextCantidadUlt'=>$value->cantFisicaTot,
'mensaje'=>$mensaje,
'status'=>$status
];

echo json_encode($datosE);

}



?>