<?php

// Desactivar toda notificación de error
//error_reporting(0);
 
// Notificar solamente errores de ejecución
//error_reporting(E_ERROR | E_WARNING | E_PARSE);

$item = null;
$valor = null;
$orden = "id";

$productos = ControladorProductos::ctrMostrarProductos($item, $valor, $orden);

 ?>


<div class="box box-primary">

  <div class="box-header with-border">

    <h3 class="box-title">Productos Agregados Recientemente</h3>
    <i class="fa fa-clock-o"></i>

    <div class="box-tools pull-right">

      <button type="button" class="btn btn-box-tool" data-widget="collapse">

        <i class="fa fa-minus"></i>

      </button>

      <button type="button" class="btn btn-box-tool" data-widget="remove">

        <i class="fa fa-times"></i>

      </button>

    </div>

  </div>
  
  <div class="box-body">

    <ul class="products-list product-list-in-box">

    <?php

    for($i = 0; $i < 6; $i++){

      echo '<li class="item">

       

        <div class=" product-info">
        
          <p class="product-title fs-4">

              '.$productos[$i]["descripcion"].'


          </p>
        
          
       </div>

      </li>';

    }

    ?>

    </ul>

  </div>

  <div class="box-footer text-center">

    <a href="productos" class="uppercase">Ver todos los productos</a>
  
  </div>

</div>
