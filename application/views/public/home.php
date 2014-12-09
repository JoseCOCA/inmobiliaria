
<!--=====================Content======================-->
<section class="content">
    <div class="grid_12 center">
        <div class="text1">Elige la mejor opción que se adapte a tus necesidades </div>
    </div>

    <div id="isotope-cont">
    	<?php $this->load->view('menu');?>

    	<div class="iso">
    	    <?php if ($query1 > 0) {?>

    	        <?php foreach ($query1 as $row) {?>

    	                <div class="box_iso <?=$row->Tipo?>">
    	                    <a href="#overlay" data-cont="<?=$row -> Filtro ?>" class= "showInfo"><img id= "img_filter" src="<?= $row -> url ?>"alt=""></a>
    	                </div>

    	        <?php }?>

    	    <?php }  ?>
    	</div>
    </div>

  <div class="container_12">
    <div class="clear"></div>
  </div>

</section>

