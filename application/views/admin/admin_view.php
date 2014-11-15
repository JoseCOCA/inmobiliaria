<!--=====================Content======================-->
<section class="content">
    <div class="grid_12 center">
        <?php if ($query > 0) {?>

            <?php foreach ($query as $row) {?>
               <?php if($row -> padre == '2'){?>
                  <a href="<?= $row -> link ?>"><img id= "img_filter" src="<?= $row -> url ?>"alt=""></a>
                <?php }?>
            <?php }?>

        <?php }  ?>

        <div class="text1">Elige la mejor opción que se adapte a tus necesidades </div>
    </div> 
    
    <div id="header"></div>
    <div id="nav">
      <ul>
        <li><a href="" data-filter="*">TODOS</a></li>
        <li><a href="" data-filter=".oficina">OFICINAS</a></li>
        <!-- <li><a href="" data-filter=".depa">DEPARTAMENTOS</a></li> -->
        <li><a href="" data-filter=".bodega">BODEGAS</a></li>
        <li><a href="" data-filter=".casa">CASAS</a></li>
      </ul>
    </div> 

    <div id="iso">
        <?php if ($query > 0) {?>

            <?php foreach ($query1 as $row) {?>
              
                        <div class="box_iso casa depa">
                            <a href="#"><img id= "img_filter" src="<?= $row -> url ?>"alt=""></a>
                        </div>
            <?php }?>

        <?php }  ?>
    </div>

  <div class="container_12">
    <div class="clear"></div>
  </div>

</section>

