<?php foreach ($contenido as $row) {
    $data[] = $row->contenido;
} 
    $terminos = $data[0];
?>
    <!--=====================Content======================-->
    <section class="content">
        <div class="container_12" style="width = 100%;">
            <div class="grid_4" style = "width: 100%; margin:0px">
                <h4 class="head2" style = "text-align: center; padding-top: 50px; ">TERMINOS DE USO</h4>
                <hr class="colourdHR">
                <p class="p1" style = "margin-top:100px;"><?= $terminos ?><!-- CONTENIDO TERMINOS DE USO. --> </p>
            </div>
            <div class="clear"></div>
        </div>
        <div class="sep__2"></div>
    </section>
    <!--==============================Bot_block=================================-->