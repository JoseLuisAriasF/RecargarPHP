<?php include 'template/header.php' ?>

<?php
 
    include 'model/conexion.php';
    $playerid =$_POST['playerid'];
    $monto_recarga=$_POST['txtMonto'];
    $banco=$_POST['cbBancos'];
    $canal_comunicacion=$_POST['rbMedios'];
    $vaucher_deposito=$_FILES['foto']['name'];



    if(isset($vaucher_deposito)){
    
      $ruta = $_FILES['foto']['tmp_name']; 
      $destino = "imgvaucher/".$vaucher_deposito;
    if(move_uploaded_file($ruta, $destino)){
            $sentencia=$bd->prepare("UPDATE detalle_cliente_recarga set monto_recarga=?,banco=?,canal_comunicacion=?,vaucher_deposito=? where playerid=?;");
          $resultado=$sentencia->execute([$monto_recarga,$banco,$canal_comunicacion,$vaucher_deposito,$playerid]);
      }
    }
    if(!file_exists($vaucher_deposito)){
      $sentencia=$bd->prepare("UPDATE detalle_cliente_recarga set monto_recarga=?,banco=?,canal_comunicacion=? where playerid=?;");
      $resultado=$sentencia->execute([$monto_recarga,$banco,$canal_comunicacion,$playerid]);
    }
        header('Location: index.php');
        exit();
    
    
?>


<?php include 'template/footer.php' ?>