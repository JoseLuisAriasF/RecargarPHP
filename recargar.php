<?php include 'template/header.php' ?>

<?php
        include_once 'model/conexion.php';
        $codigo=$_GET['id'];
        $sentences=$bd->prepare("select * from cliente inner join detalle_cliente_recarga on detalle_cliente_recarga.idcliente=cliente.id_cliente where idcliente=?");
        $sentences->execute([$codigo]);
        $persona=$sentences->fetch(PDO::FETCH_OBJ);
       // print_r($persona);
       
     
       
?>

<?php 
        include_once 'model/conexion.php';
        
        $sentencia = $bd -> query("SELECT * from cliente inner join detalle_cliente_recarga on detalle_cliente_recarga.idcliente=cliente.id_cliente where idcliente=".$codigo." and estado='EN PROCESO'");
        $persona2 = $sentencia->fetchAll(PDO::FETCH_OBJ);

        $queryMontos = $bd -> query("SELECT monto_recarga from cliente inner join detalle_cliente_recarga on detalle_cliente_recarga.idcliente=cliente.id_cliente where idcliente=1");
        $dataMontos = $queryMontos->fetchAll(PDO::FETCH_OBJ);
      
        $montoTotal=0;
        foreach($dataMontos as $montos){
            $montoTotal=$montoTotal+$montos->monto_recarga;
        }
       


        
 ?>

<div class="container  ">
  <div class="row">


  <div class="col-sm-4">
      <div class="card">
        <div class="card-header">
          Ingresar recarga:
        </div>
        <form class="p-4" method="POST" action="registrar_recarga.php" enctype="multipart/form-data">
          <input type="hidden" name="idusuario" value=<?= $persona->idcliente?>>
          <div class="mb-3">
            <label class="from-label">Nombre: </label>
            <input type="text" id="disabledInput" class="form-control" name="txtNombre" autofocus disabled require value="<?php  echo $persona->nombre; ?>">
          </div>
         
          <div class="mb-2">
            <label class="from-label">Monto: </label>
            <input type="number" id="disabledInput" class="form-control" name="txtMonto"  require>
          </div>
          <div class="mb-3">
          <label class="from-label">Bancos: </label>
              <select class="form-select" name="cbBancos" id="section" required>
                <option selected>Elije el banco</option>
                <option value="BCP">BCP</option>
                <option value="PICHINCHA">PICHINCHA</option>
                <option value="INTERBANK">INTERBANK</option>
            </select>
          </div>
          <div class="mb-3">
          <label for="Comunicacion">Canal de comunicacion</label>
            <div class="form-check">
              <input class="form-check-input" type="radio" id="W" name="rbMedios" value="WhatsApp" checked>
              <label class="form-check-label" for="W">
              WhatsApp
              </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" id="T" type="radio" name="rbMedios" value="Telegram">
            <label class="form-check-label" for="T">
            Telegram
            </label>
          </div>
          <div class="mb-3">
          <label for="formFile" class="form-label">Foto del Vaucher</label>
          <input class="form-control" type="file" name="foto" accept="image/png,image/jpeg" required>
        </div>
          <div class="d-grid">
            <input type="hidden" name="oculto" value="1">
            <input type="submit" class="btn btn-primary" value="Registrar">
          </div>
        </form>
      </div>
      
    </div>

    <div class="col-sm-4">

    
      
       
          <table class="table mb-5 align-middle ">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Monto</th>
                <th scope="col">Banco</th>
                <th scope="col">Canal</th>
                <th scope="col">Vaucher</th>
              
              
                <th scope="col" colspan="3">Opciones</th>
                
              </tr>
            </thead>
            <tbody>
              <?php
              foreach($persona2 as $dato){         
              ?>
              <tr>
                <td scope="row"><?php echo $dato->playerid; ?></td>
                <td><?php echo $dato->nombre; ?></td>
                <td><?php echo $dato->monto_recarga; ?></td>            
                <td><?php echo $dato->banco; ?></td>
                <td><?php echo $dato->canal_comunicacion; ?></td>  
               

          
                <td> <a href="imgvaucher/<?=$dato->vaucher_deposito?>" class="btn btn-primary"  target="_blank" >
                                  <i class="fas fa-file-pdf fa-2x"></i>
                                Ver Vaucher </a>
                </td>
                <td><button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#exampleModal<?=$dato->playerid?>">
                      Recargar
                    </button></td>
 
                <td><button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#staticBackdrop<?=$dato->playerid?>">
                      Editar
                    </button></td>
                <td><a href="eliminar_recarga.php?playerid=<?php echo $dato->playerid; ?>" class="btn btn-danger mb-2">
                    <i class="bi bi-arrow-clockwise"></i> Eliminar</a></td>
           
                
                
                
                      <!-- Modal recargar -->
                      <div class="modal fade" id="exampleModal<?=$dato->playerid?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">CONFIRMACION DE RECARGA</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Esta seguro que desea confirmar la recarga por S/<?=$dato->monto_recarga?> a <?=$dato->nombre?>
                            </div>
                            <div class="modal-footer">
                          
                            <a href="confirmar_recarga.php?id=<?= $dato->playerid ; ?>&saldo=<?=$dato->saldo?>&monto=<?=$dato->monto_recarga?>&idcliente=<?=$dato->id_cliente?>" class="btn btn-primary mb-2">
                             Confirmar Recarga</a>
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
               
                            </div>
                          </div>
                        </div>
                      </div>



                                  <!-- Modal editar-->
                <div class="modal fade" id="staticBackdrop<?=$dato->playerid?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                    <form action="editar_recarga.php" method="POST" enctype="multipart/form-data">
                      <div class="modal-header">                   
                        <h5 class="modal-title" id="staticBackdropLabel">Editar</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <input type="hidden" name="playerid" value=<?= $dato->playerid?>>
                        <div class="mb-3">
                          <label class="from-label">Nombre: </label>
                          <input type="text" id="disabledInput" class="form-control" name="txtNombre" autofocus disabled require value="<?php  echo $dato->nombre; ?>">
                        </div>
                      
                        <div class="mb-2">
                          <label class="from-label">Monto: </label>
                          <input type="number" id="disabledInput" class="form-control" name="txtMonto" value=<?=$dato->monto_recarga?>  require>
                        </div>
                        <div class="mb-3">
                        <label class="from-label">Bancos: </label>
                            <select class="form-select" name="cbBancos" id="section"  required>
                              <option selected>Elije el banco</option>
                              <option value="BCP"<?php if($dato->banco=='BCP')echo'selected="selected"'; ?>>BCP</option>
                              <option value="PICHINCHA"<?php if($dato->banco=='PICHINCHA')echo'selected="selected"'; ?>>PICHINCHA</option>
                              <option value="INTERBANK"<?php if($dato->banco=='INTERBANK')echo'selected="selected"'; ?>>INTERBANK</option>
                          </select>
                        </div>
                        <div class="mb-3">
                        <label for="Comunicacion">Canal de comunicacion</label>
                          <div class="form-check">
                            <input class="form-check-input" type="radio" id="W" name="rbMedios" value="WhatsApp"  <?php  if($dato->canal_comunicacion==='WhatsApp')  echo 'checked'; ?>>
                            <label class="form-check-label" for="W">
                            WhatsApp
                            </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" id="T" type="radio" name="rbMedios" value="Telegram" <?php  if($dato->canal_comunicacion=='Telegram')  echo 'checked'; ?>>
                          <label class="form-check-label" for="T">
                          Telegram
                          </label>
                        </div>
                        <div class="mb-3">
                        <label for="formFile" class="form-label">Foto del Vaucher</label>
                        <input class="form-control" type="file" name="foto" accept="image/png,image/jpeg">
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




<?php include 'template/footer.php' ?>