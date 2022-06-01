<?php include 'template/header.php' ?>

<?php
    include_once "model/conexion.php";
    $sentencia = $bd -> query("select * from cliente");
    $persona = $sentencia->fetchAll(PDO::FETCH_OBJ);
    print_r($persona);
?>




<div class="container mt-5 ">
  <div class="row">

    <div class="text-center">

      <!-- Inicio Alerta-->
  

      <!-- Fin Alerta-->
      <div class="card">
        <div class="card-header">
          Clientes
        </div>
        <div class="p-1">
          <table class="table align-middle">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">nombre</th>
                <th scope="col">edad</th>
                <th scope="col">correo</th>
                <th scope="col">telefono</th>
                <th scope="col">saldo</th>
                <th scope="col" colspan="3">Opciones</th>
                
              </tr>
            </thead>
            <tbody>
              <?php
              foreach($persona as $dato){         
              ?>
              <tr>
                <td scope="row"><?php echo $dato->id_cliente; ?></td>
                <td><?php echo $dato->nombre; ?></td>
                <td><?php echo $dato->edad; ?></td>
                <td><?php echo $dato->correo; ?></td>
                <td><?php echo $dato->telefono; ?></td>
                <td><?php echo $dato->saldo; ?></td>
                <td> <a href="recargar.php?id=<?php echo $dato->id; ?>" class="btn btn-warning mb-2 mx-3">
                  <i class="bi bi-tv"></i> Recargar</a></td>
                <td><a href="editar.php?id=<?php echo $dato->id; ?>" class="btn btn-info mb-2"   title="Actualizar datos del alumno <?php echo $dataAlumno['namefull']; ?>">
                    <i class="bi bi-arrow-clockwise"></i> Editar</a></td>
                <td><a href="eliminar.php?id=<?php echo $dato->id; ?>" class="btn btn-danger mb-2"   title="Actualizar datos del alumno <?php echo $dataAlumno['namefull']; ?>">
                    <i class="bi bi-arrow-clockwise"></i> Eliminar</a></td>
            
                <td><a class="text-success" href="editar.php?codigo=<?php echo $dato->codigo; ?>"><i class="bi bi-pencil-square"></i></a></td>
                <td><a onclick="return confirm('Estas seguro de eliminar?');" class="text-danger" href="eliminar.php?codigo=<?php echo $dato->codigo; ?>"><i class="bi bi-trash3-fill"></i></a></td>

                
                         
              <?php 
                 }   
              ?>

              </tr>
            </tbody>
          </table>
          
        </div>
      </div>
      
    </div>

  </div>
</div>

<?php include 'template/footer.php' ?>