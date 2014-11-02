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

    <?php 
      $data = array(
        'error' => '',
        'padre' => '2'
       );

        $this->load->view('upload_form', $data);
    ?>
        <div class="text1">Elige la mejor opción que se adapte a tus necesidades </div>
    </div> 
    <?php $this->load->view('menu');?>    
    
    <div id="iso">
        <?php if ($query > 0) {?>

            <?php foreach ($query as $row) {?>
               <?php if($row -> padre == '3'){?>
                        <div class="box_iso casa depa">
                            <a href="<?= $row -> link ?>"><img id= "img_filter" src="<?= $row -> url ?>"alt=""></a>
                        </div>
                <?php }?>
            <?php }?>

        <?php }  ?>
    </div>

    <?php 
      $data = array(
        'error' => '',
        'padre' => '3'
       );

        $this->load->view('upload_form', $data);
    ?>

  <div class="container_12">
    <div class="clear"></div>
  </div>

</section>

