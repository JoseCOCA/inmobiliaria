<!--==============================Bot_block=================================-->
<!--==============================footer=================================-->
<footer> 
  <div class="container_12">
    <p style = "padding-left: 40px; padding-right: 40px; margin-bottom: 70px;">Lorem ipsum dolor sit amet, consectetur adipisicing elit. 
      Asperiores vitae eos quia, quo numquam quae, earum deserunt similique perferendis 
      libero fuga dolores odit. Labore earum, cum aperiam, eius expedita molestias?
      Lorem ipsum dolor sit amet, consectetur adipisicing elit. 
      Voluptatem, voluptate veritatis porro, minima commodi esse. 
      Commodi maiores repudiandae quisquam enim qui autem sed nisi 
      odit facilis, ipsa illo magnam, praesentium!</p>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dignissimos incidunt dolorum quidem et debitis labore deleniti quaerat non. Recusandae quibusdam nihil voluptate exercitationem dignissimos eligendi, tempora, perspiciatis fugit? Rem, eius.</p>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dignissimos incidunt dolorum quidem et debitis labore deleniti quaerat non. Recusandae quibusdam nihil voluptate exercitationem dignissimos eligendi, tempora, perspiciatis fugit? Rem, eius.</p>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dignissimos incidunt dolorum quidem et debitis labore deleniti quaerat non. Recusandae quibusdam nihil voluptate exercitationem dignissimos eligendi, tempora, perspiciatis fugit? Rem, eius.</p>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dignissimos incidunt dolorum quidem et debitis labore deleniti quaerat non. Recusandae quibusdam nihil voluptate exercitationem dignissimos eligendi, tempora, perspiciatis fugit? Rem, eius.</p>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dignissimos incidunt dolorum quidem et debitis labore deleniti quaerat non. Recusandae quibusdam nihil voluptate exercitationem dignissimos eligendi, tempora, perspiciatis fugit? Rem, eius.</p>
  </div>  
  <div class="clear"></div>
  <div class="sep__1"></div>
  <div class="foot_colourd">
  </div>
</footer>
<script type="text/javascript" src="assets/js/jquerypp.custom.js"></script>
    <script type="text/javascript" src="assets/js/jquery.elastislide.js"></script>
    <script type="text/javascript">
      
      $( '#carousel' ).elastislide( {
        minItems : 8
      } );
      jQuery(document).ready(function(){
        /*Stickybar*/
        $('.menu_block').sticky({topSpacing:0});
        
      });
      $('.menu_block').on('sticky-start', function (e) { 
        e.preventDefault();
        var altura = document.querySelector('.menu_block').offsetHeight;
        $('#nav').sticky({topSpacing:46}).css({'z-index': '99', 'width': '100%'});
      });
  


    </script>
</body>
</html>

