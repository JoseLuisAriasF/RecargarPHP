
<?php
 
 include 'model/conexion.php';
 $playerid =$_GET['id'];
 $id_cliente =$_GET['idcliente'];
 $estado="REVISADO";
 $saldo =$_GET['saldo'];
 $monto_recarga =$_GET['monto'];



        $query2=$bd->prepare("UPDATE cliente set saldo=? where id_cliente=?;");
        $resultado2=$query2->execute([$saldo+$monto_recarga,$id_cliente]);

         $sentencia=$bd->prepare("UPDATE detalle_cliente_recarga set estado=? where playerid=?;");
       $resultado=$sentencia->execute([$estado,$playerid]);

      
 

     header('Location: index.php');
     exit();
 
 
?>