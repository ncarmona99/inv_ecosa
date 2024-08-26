<?php 
include('connection.php');
$con = connection();

$idProducto = $_POST['seleccion'];
$solicitante = $_POST['solicitante'];
$cantidad = $_POST['cantidad'];

$sql_stock = "SELECT stock FROM mydb.Producto WHERE idProducto = $idProducto";

$query_stock = mysqli_query( $con, $sql_stock );
$stock = mysqli_fetch_array( $query_stock )['stock'];


if ($cantidad <= $stock){
    $nuevoStock = $stock - $cantidad;

    $query = "INSERT INTO mydb.Solicitud(Producto_idProducto, Solicitante_idSolicitante, fechaSolicitud, cantidad) VALUES('$idProducto','$solicitante',sysdate(), $cantidad); UPDATE mydb.Producto SET stock = $nuevoStock WHERE idProducto = $idProducto;";
    $sql = mysqli_multi_query($con, $query);
    if($sql){
        header("Refresh:0; url=index.php");
    }
    else{
        echo"$idProducto";
        echo"$solicitante";
        echo"$cantidad";
    }
}
else{
    echo "$stock";
    echo "$cantidad";
}
