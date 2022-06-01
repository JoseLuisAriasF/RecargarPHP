<?php include 'template/header.php' ?>

<?php
    include_once "model/conexion.php";
    $sentencia = $bd -> query("select * from cliente");
    $persona = $sentencia->fetchAll(PDO::FETCH_OBJ);

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
                <td> <a href="recargar.php?id=<?php echo $dato->id_cliente; ?>" class="btn btn-primary mb-2 mx-3">
                  <i class="bi bi-tv"></i> Recargar</a></td>
                  <td> <a href="reportepdf.php?id=<?php echo $dato->id_cliente; ?>" class="btn btn-success mb-2 mx-3">
                  <i class="bi bi-eye-fill"></i> Historial</a></td>
                
                    <td><button  type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#staticBackdrop<?=$dato->id_cliente?>">
                      Editar
                    </button></td>
               
                    
                                             <!-- Modal editar-->
                <div class="modal fade" id="staticBackdrop<?=$dato->id_cliente?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                    <form action="editar_cliente.php" method="POST">
                      <div class="modal-header">                   
                        <h5 class="modal-title" id="staticBackdropLabel">Editar</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <input type="hidden" name="idcliente" value=<?= $dato->id_cliente?>>
                        <div class="mb-3">
                          <label class="from-label">Nombre: </label>
                          <input type="text" id="disabledInput" class="form-control" name="txtNombre" autofocus require value="<?php  echo $dato->nombre; ?>">
                        </div>
                        <div class="mb-3">
                          <label class="from-label">Edad: </label>
                          <input type="text" id="disabledInput" class="form-control" name="txtEdad" autofocus require value="<?php  echo $dato->edad; ?>">
                        </div>
                        <div class="mb-3">
                          <label class="from-label">Correo: </label>
                          <input type="text" id="disabledInput" class="form-control" name="txtCorreo" autofocus require value="<?php  echo $dato->correo; ?>">
                        </div>
                        <div class="mb-3">
                          <label class="from-label">Telefono: </label>
                          <input type="text" id="disabledInput" class="form-control" name="txtTelefono" autofocus require value="<?php  echo $dato->telefono; ?>">
                        </div>
                      
                       
                      

                        
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Editar</button>
                      </div>
                         </form>
                    </div>
                  </div>
                </div>
            
                

                
                         
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