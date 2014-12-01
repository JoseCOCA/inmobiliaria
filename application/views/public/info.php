<?php 


    if ($contenido) {
        foreach ($contenido as $row) {
            $dataCont[] = $row->contenido;
        }
    }
    $nosotros    =   $dataCont[0];
    $mision      =   $dataCont[1];
    $experiencia =   $dataCont[2];
 ?>
<!--=====================Content======================-->
<section class="content">

    <div class="container_12" style = "margin-top: 30px;">
        <div class="grid_4" style = "background: lightblue;">

            <div class="extra_wrapper">
                <h3 style="text-align:center;">NOSOTROS</h3>
                <p style= "padding-right: 20px; padding-left: 20px;">
                    <?php echo $nosotros;  ?>   <!-- CONTENIDO NOSOTROS -->
                </p>
            </div>
        </div>    
        <div class="grid_8">
            
            <div class="block1">
                <h3>MISION/VISIÓN</h3>
                    <!-- CONTENIDO MISION   -->
                <?php echo $mision; ?>
                <h3>NUESTRA EXPERIENCIA-PRESENCIA EN EL MERCADO</h3>
                
                <p>
                    <?php echo $experiencia; ?>    <!--CONTENIDO EXPERIENCIA -->                
                </p>
                
            </div>      
        </div>
        <div class="clear"></div>
    </div>
    
</section>