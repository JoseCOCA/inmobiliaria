<!-- Panel de administración para la inmobiliaria:
En este se muestra un formulario para la modificación de la información en las
descripciones de las propiedades existentes, se tiene la posibilidad de borrar
o crear nuevas propiedades -->


<!-- SIDR -->
<div id="sidr">
    <h1>Elige una propiedad</h1>
    
    <?php if ($query1 > 0) { ?>
        <ul id="lista-propiedades">
        <?php foreach ($query1 as $row) { ?>

            
                <li>
                    <a href="#sidr" id="<?=$row-> Filtro?>" class="configFilter showInfo" data-cont="<?=$row -> Filtro ?>">
                    <img src="<?= $row -> url ?>" />
                    <p><?=$row-> nombre?></p>
                    </a>
                </li>
           

        <?php } ?>
        </ul>
    <?php } ?>


    <?php

    

    $Filtro = 'F'.($lastFilter+1);

    ?>

    <?php //echo form_open_multipart('admin/newFilter') ?>


    <h1 class="add-propiety">Agregar nueva propiedad</h1>
    <?php

    //echo form_hidden('Filtro', $Filtro);?>
    <!-- <label for="propiedad-nombre">Nombre:</label>
    <input type="text" class="nombre" id="propiedad-nombre" name="propiedad-nombre" value="<?//=$Filtro?>">
    <input type="file" name="userfile">
    <input type="submit" value="upload" /> -->
    
    <form id="nuevaPropiedad" action="<?=base_url()?>php/upload_images.php" method="post" enctype="multipart/form-data" autocomplete="off">
        <div id="image_preview" title="Arrastra aquí la imagen"><img id="previewing" /></div>
        <div id="selectImage">
            <label for="file-upl">Seleciona imagen para propiedad</label><br/>
            <input type="file" name="file-upl" id="file-upl" required="required" accept="image/*" />
            <button class='input-btn' id='input_btn'>Buscar archivo...</button>
            <input type="text" class="nombre" id="propiedad-nombre" name="propiedad-nombre" value="<?=$Filtro?>" />
            <input type="hidden" class="nuevo-filtro" id="nuevo-filtro" name="nuevo-filtro" value="<?=$Filtro?>" />
            <input type="hidden" class="propiedad" id="propiedad-nueva" name="propiedad" value="nueva">
        </div>
    </form>
   <!--  <h4 id='loading' >loading..</h4>
    <div id="message"></div>
 -->
    <?php //echo form_close(); ?>


</div>
<!-- //SIDR -->


<div id="main">
    <div id="welcome">
        
        <h1>Bienvenido al administrador</h1>
    </div>
    <div class="config_container oculto">
        
		<!-- CARRUSEL -->
		<ul class="carrusel">

		</ul>
        <!-- UPLOAD IMÁGENES -->
        <h3>Agrega nuevas imágenes a esta propiedad</h3>
        <form id="upload" method="post" action="<?=base_url()?>php/upload_images.php" enctype="multipart/form-data">
            <div id="drop">
                Arrastra tus archivos aquí

                <a>Buscar</a>
                <input type="file" name="upl" multiple />
            </div>

            <ul>
                <!-- The file uploads will be shown here -->
            </ul>
            <input type="hidden" id="filtro-hd" name="Filtro" />
            <input type="hidden" id="add-hd" value="Agregar imagenes" name="adminPanel" />

        </form>
        
        <!-- CONTENIDOS EDITABLES -->
        <h3>Edita la información de esta propiedad</h3>
        <div class="box-editable">
            <h4>Descripcion</h4>
            <div contenteditable="true" class="div-editable" id="descripcion"><!-- CONTENIDO --></div>
        </div>
        <div class="box-editable">
            <h4>Condiciones</h4>
            <div contenteditable="true" class="div-editable" id="condiciones"><!-- CONTENIDO --></div>
        </div>
        <div class="box-editable">
            <h4>CalleNo</h4>
            <div contenteditable="true" class="div-editable" id="calleNo"><!-- CONTENIDO --></div>
        </div>
        <div class="box-editable">
            <h4>Colonia</h4>
            <div contenteditable="true" class="div-editable" id="colonia"><!-- CONTENIDO --></div>
        </div>
        <div class="box-editable">
            <h4>Delegación</h4>
            <div contenteditable="true" class="div-editable" id="delegacion"><!-- CONTENIDO --></div>
        </div>

        <div class="box-editable">
            <h4>CP</h4>
            <div contenteditable="true" class="div-editable" id="cp"><!-- CONTENIDO --></div>
        </div>
        <div class="box-editable">
            <h4>Dimensión</h4>
            <div contenteditable="true" class="div-editable" id="dimension"><!-- CONTENIDO --></div>
        </div>
        <div class="box-editable">
            <h4>Precio</h4>
            <div contenteditable="true" class="div-editable" id="precio"><!-- CONTENIDO --></div>
        </div>
        
        <div class="styled-select blue semi-square">

            <select id="tipo" name="tipo">
                <option value="Casa">Casa</option>
                <option value="Bodega" selected="selected">Bodega</option>
                <option value="Departamento">Departamento</option>
                <option value="Oficina">Oficina</option>
            </select>
        </div>
        <div class="styled-select blue semi-square">

            <select id="status" name="status">
                <option value="venta">Venta</option>
                <option value="renta" selected="selected">Renta</option>
                <option value="NO DISPONIBLE">No disponible</option>
            </select>
        </div>
        <br>
         <!-- Textos completos   ID  url     nombre  Descripcion     Tipo    Condicion   Condiciones     Filtro  CalleNo     Colonia     Delegacion  CP  Dimension Precio -->

    </div>

</div>

<!-- <div id="adminPanel">

    <div class="config_container">

        <?php foreach ($query1 as $row) { ?>

        <?php
        $FiltroPadre    = $row -> Filtro;
        $Descripcion    = $row -> Descripcion;
        $Tipo           = $row -> Tipo;
        $CP             = $row -> CP;
        $Status         = $row -> Status;
        $Condiciones    = $row -> Condiciones;
        $CalleNum       = $row -> CalleNo;
        $Colonia        = $row -> Colonia;
        $Delegacion     = $row -> Delegacion;
        $Dimension      = $row -> Dimension;
        $Precio         = $row -> Precio;

        ?>



        <div class="adminInput <?=$row-> Filtro?> ">

            <a href="#"  class="adminPanel_close"><img id="close" src="images/boton_close.png" alt=""></a>


                        <div class="slide-cont">
                <div class="slide" id="este-">
                    <ul class="slider-cont" data-slide="" id="slider">
                        IMÁGENES CARRUSEL PROPIEDAD
                        <li><img src="http://lorempixel.com/g/750/450" alt="" class="image_slide"></li>
                    </ul>
                <ul class="slider-cont" id= "<?=$row -> Filtro ?>">

                <?php foreach ($query as $row) { ?>

                <?php $FiltroSlider = $row-> Filtro ?>

                <?php if ($FiltroPadre == $FiltroSlider) { ?>

                <li><img src="<?=$row-> url?>" alt="" class="image_slide"></li>

                <?php } ?>
                <?php } ?>

                </ul>
                </div>
            </div>

            <?php echo form_open_multipart('admin/getData'); ?>


            <div class="text-content">
                <div class="content1">

                    <input type="hidden" name="Filtro" value="<?= $FiltroPadre ?>">

                    <p>Seleccionar imagenes:</p>
                    <input type="file" name="files[]" multiple>

                    <?php echo form_submit('adminPanel', 'Agregar imagenes'); ?>
                    <br>
                    <p>Eliminar imagenes:</p>


                    <?php

                    $optionsBanner = array(

                        '0' => 'Ninguno',

                        );

                    if($query > 0){

                        $principal = '';

                        foreach ($query as $row) {

                            $FiltroSlider = $row-> Filtro;
                            $ImageName = $row -> nombre;
                            if( $FiltroSlider == $FiltroPadre){

                                $optionsBanner[$ImageName] =  $ImageName;

                            }

                            if($row-> principal == '1' and $FiltroPadre == $FiltroSlider){
                                $principal = $row-> nombre;
                            }

                        }

                    }


                    echo form_multiselect('delete[]',$optionsBanner);
                    echo form_submit('adminPanel', 'Eliminar Imagenes');
                    ?>
                    <br>

                    <p id= "check-text">BANNER PRINCIPAL</p>

                    <?php

                    echo form_dropdown('principal',$optionsBanner,$principal);


                    ?>

                    <p>Tipo inmueble</p>

                    <?php $options = array(

                        'Casa'          =>  'Casa',
                        'Bodega'        =>  'Bodega',
                        'Departamento'  =>  'Departamento',
                        'Oficina'       =>  'Oficina',

                        );

                    $id = 'id="inmueble"';

                    echo form_dropdown('inmueble', $options,$Tipo,$id);

                    ?>

                    <br>

                    <p id= "check-text" style="margin-right:15%;">RECOMENDADO</p>

                    <?php
                    $optionsRec = array(

                        '0' => 'Ninguno',

                        );

                    if($query > 0){

                         $recomendado = '';

                        foreach ($query as $row) {

                            $FiltroSlider = $row-> Filtro;
                            if( $FiltroSlider == $FiltroPadre){

                                $optionsRec[$row-> nombre] =  $row -> nombre;

                            }
                            if($row-> recomendado == '1' and $FiltroPadre == $FiltroSlider){
                                $recomendado = $row-> nombre;
                            }

                        }

                    }

                    echo form_dropdown('recomendado',$optionsBanner,$recomendado);

                    ?>

                    <p>Status</p>

                    <?php $options = array(

                        'venta'         =>  'Venta',
                        'renta'         =>  'Renta',
                        'NoDisponible'  =>  'No Disponible',
                        );

                    $id = 'id="status"';

                    echo form_dropdown('Status', $options,$Status,$id);

                    ?>



                    <hr>
                </div>

                <div class="AdminHeaders">
                    <p>UBICACIÓN</p>
                </div>

                <p style="padding-top:30px;">Calle y Número:</p>
                <input type="text" class="ubiEdit" id="calleNum" name="CalleNumero" value="<?= $CalleNum ?>">

                <p>Colonia:</p>
                <input type="text" class="ubiEdit" id="colonia" name="Colonia" value="<?= $Colonia ?>">

                <p>Delegación:</p>
                <input type="text" class="ubiEdit" id="delegacion" name="Delegacion" value="<?= $Delegacion ?>">

                <p>Codigo Postal:</p>
                <input type="text" class="ubiEdit" id="CP" name="CodigoPostal" value="<?= $CP ?>">

                <div class="contentDesc">

                    <div class="AdminHeaders">
                        <p>DESCRIPCIÓN</p>
                    </div>

                    <textarea id="descripción" name="descripcion" style= "text-aign: justify;"class="ubiEdit" rows="4" cols="50" style="margin-top:30px;" placeholder="Porporcione una descripción detallada"><?= $Descripcion ?></textarea>

                    <div class="AdminHeaders">
                        <p>CONDICIONES DE CONTRATACIÓN</p>
                    </div>

                    <textarea id="condiciones" name="condiciones" class="ubiEdit" rows="4" cols="50" style="margin-top:30px;" placeholder="Proporcione las condiciones de contratación de considere nesecarias."><?= $Condiciones ?></textarea>
                    <p>Dimensiones:</p>

                    <input type="text" class="ubiEdit" id="dim" name="dimensiones" value="<?= $Dimension ?>">

                    <p>Precio:</p>

                    <input type="text" class="ubiEdit" id="cost" name="precio" value="<?= $Precio ?>">

                </div>

                <hr>

                <?php echo form_submit('adminPanel', 'Modificar'); ?>

                <?php echo form_submit('adminPanel', 'Eliminar'); ?>


            </div>
            <?php echo form_close(); ?>

        </div>

        <?php  } ?>

    </div>

</div> -->



