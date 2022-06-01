
<?php
    //print_r($_POST);

    include_once 'model/conexion.php';
   
    $idcliente=$_POST['idusuario'];
    $monto_recarga=$_POST['txtMonto'];
    $banco=$_POST['cbBancos'];
    $canal_comunicacion=$_POST['rbMedios'];
    $vaucher_deposito=$_FILES['foto']['name'];     
    date_default_timezone_set("America/Lima"); 
    $fecha_registro=date('Y-m-d H:i:s');
    $estado="EN PROCESO";
    
    //$sentences=$bd->prepare("SELECT saldo from cliente WHERE idclientes='idusuario'");
    

    $ruta = $_FILES['foto']['tmp_name']; 
    $destino = "imgvaucher/".$vaucher_deposito;

    

    if(move_uploaded_file($ruta, $destino)){
       
        $sentencia=$bd->prepare("INSERT INTO detalle_cliente_recarga(idcliente,monto_recarga,banco,canal_comunicacion,vaucher_deposito,fecha_registro,estado) VALUES(?,?,?,?,?,?,?);");
        $sentencia->execute([$idcliente,$monto_recarga,$banco,$canal_comunicacion,$vaucher_deposito,$fecha_registro,$estado]);
    }

    
    header('Location: index.php');
    exit();
 ?>