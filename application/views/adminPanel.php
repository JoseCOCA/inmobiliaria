
    <div id="adminPanel">

      <div class="filter_container">

        	<?php foreach ($query1 as $row) {?>

             <a href="#" id="<?=$row-> Filtro?>" class="configFilter" ><img src="<?= $row -> url ?>" alt="Product Name" /></a>

             <?php } ?>

             <?php  ?>

            
      </div>
		
	

      	<div class="config_container">
        
        <?php foreach ($query1 as $row) { ?>

        <?php 	
	        $FiltroPadre = $row-> Filtro;
	        $Descripcion = $row-> Descripcion;
	     ?>

          <div class="adminInput <?=$row-> Filtro?> oculto">
      
          <a href="#"  class="adminPanel_close"><img id="close" src="images/button_close.png" alt=""></a>
      
        <ul id= "<?=$row -> Filtro ?>">

        	<?php foreach ($query as $row) { ?>

        	<?php $FiltroSlider = $row-> Filtro ?>

        	<?php if ($FiltroPadre == $FiltroSlider) { ?>

        		<li><img src="<?=$row-> url?>" alt="" class="image_slide"></li>

        	<?php } ?>
        	<?php } ?>  

        </ul>

        <?php echo form_open_multipart('admin/getData'); ?>

        
        <div class="text-content">
          <div class="content1">

            <input type="hidden" name="Filtro" value="<?= $FiltroPadre ?>">

            <p>Seleccionar imagenes:</p>
            <input type="file" name="files[]" multiple>
            <br>

            <div class="checkbox-1AD">

              <input type="checkbox" name="principal" id="principal">
              <label for="principal"></label> 

            </div>
            
            <p id= "check-text">BANNER PRINCIPAL</p>
            
            <?php $options = array(

                'Casa'          =>  'Casa',
                'Bodega'        =>  'Bodega',
                'Departamento'  =>  'Departamento',
                'Oficina'       =>  'Oficina',



            ); 

            $id = 'id="inmueble"';

            echo form_dropdown('inmueble', $options,'',$id);

            ?>

            <br>

            <div class="checkbox-2AD">

              <input type="checkbox" name="recomendado" id="recomendado">
              <label for="recomendado"></label> 

            </div>
            <p id= "check-text" style="margin-right:15%;">RECOMENDADO</p>

            <?php $options = array(

                'venta'         =>  'Venta',
                'renta'         =>  'Renta',
                'NoDisponible'  =>  'No Disponible',
            ); 

            $id = 'id="status"';

            echo form_dropdown('Status', $options,'',$id);

            ?>



            <hr>          
          </div>

          <div class="AdminHeaders">
           <p>UBICACIÓN</p>

          </div>
          
          <p style="padding-top:30px;">Calle y Número:</p>
          <input type="text" class="ubiEdit" id="calleNum" name="CalleNumero">

          <p>Colonia:</p>
          <input type="text" class="ubiEdit" id="colonia" name="Colonia">

          <p>Delegación:</p>
          <input type="text" class="ubiEdit" id="delegacion" name="Delegacion">

          <p>Codigo Postal:</p>
          <input type="text" class="ubiEdit" id="CP" name="CodigoPostal">
          
          <div class="contentDesc">
          
          <div class="AdminHeaders">
           <p>DESCRIPCIÓN</p>
          </div>
          
            <textarea id="descripción" name="descripcion" style= "text-aign: justify;"class="ubiEdit" rows="4" cols="50" style="margin-top:30px;" placeholder="Porporcione una descripción detallada"></textarea>          

          <div class="AdminHeaders">
            <p>CONDICIONES DE CONTRATACIÓN</p>
          </div>   
            
           <textarea id="condiciones" name="condiciones" class="ubiEdit" rows="4" cols="50" style="margin-top:30px;" placeholder="Proporcione las condiciones de contratación de considere nesecarias."></textarea> 
         

          </div>

        <hr> 

        <?php echo form_submit('submit', 'Modificar'); ?>

          </div>
            <?php echo form_close(); ?>
      
        </div>
		
		<?php  } ?>  

      </div>

    </div>			


