
<?php
 
    include 'model/conexion.php';
   

    $id_cliente=$_POST['idcliente'];
    $nombre=$_POST['txtNombre'];
    $edad=$_POST['txtEdad'];
    $correo=$_POST['txtCorreo'];
    $telefono=$_POST['txtTelefono'];
   


            $sentencia=$bd->prepare("UPDATE cliente set nombre=?,edad=?,correo=?,telefono=? where id_cliente=?;");
          $resultado=$sentencia->execute([$nombre,$edad,$correo,$telefono,$id_cliente]);
   
        header('Location: index.php');
        exit();
    
    
?>




