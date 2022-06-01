<?php 
       
        include 'model/conexion.php';
        $codigo=$_GET['playerid'];
        $sentencia=$bd->prepare("DELETE FROM detalle_cliente_recarga where playerid=?;");
        $resultado=$sentencia->execute([$codigo]);

       
            header('Location: index.php');
            exit();

      


 ?>