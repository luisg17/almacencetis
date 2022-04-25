<?php

if($_SESSION["perfil"] == "Vendedor"){

  echo '<script>

    window.location = "inicio";

  </script>';

  return;

}

?>
<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Administrar productos
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Administrar productos</li>
    
    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">
  
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarProducto">
          
          Agregar producto

        </button>

      </div>

      <div class="box-body">
        
       <table class="table table-bordered table-striped dt-responsive tablaProductos" width="100%">
         
        <thead>
         
         <tr>
           
           <th style="width:10px">#</th>
           <th>Código</th>
           <th>Nombre Producto</th>
           <th>Categoría</th>
           <th>Existencia</th>
           <th>Unidad</th>
           <th>Precio de compra</th>
           <th>Fecha de Entrada</th>
           <th>Acciones</th>
           
         </tr> 

        </thead>      

       </table>

       <input type="hidden" value="<?php echo $_SESSION['perfil']; ?>" id="perfilOculto">

      </div>

    </div>

  </section>

</div>

<!--=====================================
MODAL AGREGAR PRODUCTO
======================================-->

<div id="modalAgregarProducto" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar producto</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">


            <!-- ENTRADA PARA SELECCIONAR CATEGORÍA -->

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                <select class="form-control input-lg" id="nuevaCategoria" name="nuevaCategoria" required>
                  
                  <option value="">Selecionar categoría</option>

                  <?php

                  $item = null;
                  $valor = null;

                  $categorias = ControladorCategorias::ctrMostrarCategorias($item, $valor);

                  foreach ($categorias as $key => $value) {
                    
                    echo '<option value="'.$value["id"].'">'.$value["categoria"].'</option>';
                  }

                  ?>
  
                </select>

              </div>

            </div>

            <!-- ENTRADA PARA EL CÓDIGO -->
            
            <div class="form-group">
                <label>Código:</label>
                <div class="input-group">
                
                  <span class="input-group-addon"><i class="fa fa-code"></i></span> 

                  <input type="text" class="form-control input-lg" id="nuevoCodigo" name="nuevoCodigo" placeholder="Ingresar código" >

                </div>

            </div>

            <!-- ENTRADA PARA LA DESCRIPCIÓN -->

             <div class="form-group">
                <label>Descripción:</label>
                <div class="input-group">
                
                  <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span> 

                  <input type="text" class="form-control input-lg" name="nuevaDescripcion" placeholder="Ingresar descripción" required>

                </div>

            </div>
             <!-- ENTRADA PARA STOCK -->

             <div class="form-group">
                <label>Existencia:</label>
                <div class="input-group">
                
                  <span class="input-group-addon"><i class="fa fa-check"></i></span> 

                  <input type="" class="form-control input-lg" name="nuevoStock" min="0" placeholder="Stock" required>

                </div>

             </div>

            <!-- ENTRADA PARA UNIDADES -->

            <div class="form-group">
              
              <label>Seleccione las unidades</label>
               <div class="input-group">
            
              <span class="input-group-addon"><i class="fa fa-archive"></i></span> 
              
              <select class="form-control input-lg" id="nuevaPresentacion" name="nuevaPresentacion" required >
              <option value="" >Selecionar las unidades</option>

                <?php

                $item = null;
                $valor = null;

                $presentaciones = ControladorPresentaciones::ctrMostrarPresentaciones($item, $valor);

                foreach ($presentaciones as $key => $value) {
                  
                  
                  echo '<option value="'.$value["id"].'">'.$value["presentacion"].'</option>"
              ';
                }
                ?>

              </select>

            </div>
              
             <!-- ENTRADA PARA FECHA -->

             <div class="form-group">
                 <label>Fecha de entrada:</label>

                  <div class="input-group date">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
                    <input type="date" id="nuevaFechaEntrada" name="nuevaFechaEntrada" placeholder="Fecha Entrada" data-inputmask="'alias:' 'yyyy/mm/dd'" data-mask class="form-control pull-right" required  />
                  </div>
                
              </div>

                  <!-- ENTRADA PARA PRECIO COMPRA -->

                  <div class="form-group row">

                        <div class="col-xs-6">
                            <label>Precio de Compra:</label>
                        
                            <div class="input-group">
                              <span class="input-group-addon"><i class="fa fa-dollar"></i></span> 

                              <input type="number" class="form-control input-lg" id="nuevoPrecioCompra" name="nuevoPrecioCompra" step="any" min="0" placeholder="Precio de compra" >

                            </div>
                            

                        </div>

                   <!-- ENTRADA PARA REGISTRO SIBISEB -->

                        <div class="col-xs-6">

                            <div class="form-group">
                            
                                    <label>
                                    
                                      <input type="checkbox" class="" id="registrosebi"  >
                                      ¿Se requiere registrar en el SIBISEB?
                                    </label>

                                    <label class="hidden " id="lproducto">¿El producto esta registrado?</label> 
                              
                                    <div class="input-group hidden " id="lvalidacion">

                                        <span class="input-group-addon"><i class="fa fa-check"></i></span> 

                                        <select class="form-control input-lg" id="nuevoRegistro" name="nuevoRegistro" required >
                                        <?php

                                            $item = null;
                                            $valor = null;

                                            $registros = ControladorRegistros::ctrMostrarRegistros($item, $valor);

                                            foreach ($registros as $key => $value) {
                                              
                                              echo '<option value="'.$value["id"].'">'.$value["nombre"].'</option>';
                                            }

                                        ?>

                                        </select>

                                    </div>
                            </div>

                        </div>

                  </div>

            </div> 

                </div>

            
          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar producto</button>

        </div>

      </form>

        <?php

          $crearProducto = new ControladorProductos();
          $crearProducto -> ctrCrearProducto();

        ?>  

    </div>

  </div>

</div>

<!--=====================================
MODAL EDITAR PRODUCTO
======================================-->

<div id="modalEditarProducto" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar producto</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">


            <!-- ENTRADA PARA SELECCIONAR CATEGORÍA -->

            <div class="form-group">
              
                <label for="idvalorCategoria">Seleccione una Categoria</label>
                 <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 
                
                <select class="form-control input-lg" id="valorCategoria" name="editarCategoria" readonly >
                <option disabled >Selecionar categoría</option>
                  
                  <?php

                  $item = null;
                  $valor = null;

                  $categorias = ControladorCategorias::ctrMostrarCategorias($item, $valor);

                  foreach ($categorias as $key => $value) {
                    
                    
                    echo '<option value="'.$value["id"].'">'.$value["categoria"].'</option>"
                ';
                  }
                  ?>

                </select>

              </div>

            </div>

            <!-- ENTRADA PARA EL CÓDIGO -->
            
            <div class="form-group">
              
              <label>Código del producto</label>
              <div class="input-group">
                
                <span class="input-group-addon"><i class="fa fa-code"></i></span> 
                <input type="text" class="form-control input-lg" id="editarCodigo" name="editarCodigo"  >
                <input type="hidden" id="idProducto" name="idProducto">

              </div>

            </div>

            <!-- ENTRADA PARA LA DESCRIPCIÓN -->

             <div class="form-group">
              
              <label>Descripción del Producto</label>
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span> 

                <input type="text" class="form-control input-lg" id="editarDescripcion" name="editarDescripcion" required>

              </div>

            </div>

             <!-- ENTRADA PARA STOCK -->

             <div class="form-group">
              
              <label>Existencia</label>
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-check"></i></span> 

                <input type="number" class="form-control input-lg" id="editarStock" name="editarStock" min="0" required>

              </div>

            </div>
            
             <!-- ENTRADA PARA las unidades -->

             <div class="form-group">
              
              <label>Seleccione las unidades</label>
               <div class="input-group">
            
              <span class="input-group-addon"><i class="fa fa-archive"></i></span> 
              
              <select class="form-control input-lg" id="valorPresentacion" name="editarPresentacion" readonly >
              <option disabled >Selecionar las unidades</option>
                
                <?php

              
                foreach ($presentaciones as $key => $value) {
                  
                  
                  echo '<option value="'.$value["id"].'">'.$value["presentacion"].'</option>"
              ';
                }
                ?>

              </select>

            </div>
              

          </div>


             <!-- ENTRADA PARA FECHA -->
             <div class="form-group">
                <label>Fecha de entrada:</label>

                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="date" id="editarFechaEntrada" name="editarFechaEntrada" data-inputmask="'alias:' 'yyyy/mm/dd'" data-mask class="form-control pull-right"  >
                </div>
                <!-- /.input group -->
              </div>


                <!-- ENTRADA PARA PRECIO COMPRA -->

                <div class="form-group row">

                    <div class="col-xs-6">
                        <label>Precio de Compra:</label>

                        <div class="input-group">
                          <span class="input-group-addon"><i class="fa fa-dollar"></i></span> 

                          <input type="number" class="form-control input-lg" id="editarPrecioCompra" name="editarPrecioCompra" step="any" min="0" placeholder="Precio de compra" >

                        </div>
                        

                </div>

                <!-- ENTRADA PARA REGISTRO SIBISEB -->

                <div class="col-xs-6">

                    <div class="form-group">
                    
                
                            <label class=" " id="lproductoAct">¿El producto esta registrado?</label> 
                      
                            <div class="input-group  " id="lvalidacionAct">

                                <span class="input-group-addon"><i class="fa fa-check"></i></span> 

                                <select class="form-control input-lg" id="valorRegistro" name="editarRegistro" required >
           
                                <?php

                                    $item = null;
                                    $valor = null;

                                    $registros = ControladorRegistros::ctrMostrarRegistros($item, $valor);

                                    foreach ($registros as $key => $value) {
                                      
                                      echo '<option value="'.$value["id"].'">'.$value["nombre"].'</option>';
                                    }

                                ?>

                                </select>

                              </div>
                    </div>

                </div>

</div>

                </div>
           

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar cambios</button>

        </div>

      </form>

        <?php

          $editarProducto = new ControladorProductos();
          $editarProducto -> ctrEditarProducto();

        ?>      

    </div>

  </div>

</div>

<?php

  $eliminarProducto = new ControladorProductos();
  $eliminarProducto -> ctrEliminarProducto();

?>      



