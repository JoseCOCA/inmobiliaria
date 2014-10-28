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
      jQuery(document).ready(function () {
        $('.menu_block').sticky({topSpacing:0});
                /*Sticky bar*/
         /*stickyNav();  
         var stickyNavTop = $('.menu_block').offset().top;  

         function stickyNav(){  
            var scrollTop = $(window).scrollTop();  

            if (scrollTop > stickyNavTop) {   
               $('.menu_block').addClass('sticky');  
            } else {  
               $('.menu_block').removeClass('sticky');   
            }  
         };  


         $(window).scroll(function() {  
            stickyNav();  
         });*/
      /*//Sticky bar*/       


      })
        /*posicionarMenu();

        $(window).scroll(function() {
            posicionarMenu();
        })

        function posicionarMenu() {
            var altura_del_header = $('header').outerHeight(true);
            var altura_del_menu = $('.menu_block').outerHeight(true);
            var altura_del_content = $('.content').outerHeight(true);

            if ($(window).scrollTop() >= altura_del_header-altura_del_menu){
                $('.menu_block').addClass('sticky');
                $('.content').css('padding-top', (altura_del_menu) + 'px');
                $('.sticky').animate({'padding-bottom':'10px','padding-top':'35px'}, 500);
            } else if($('.menu_block').scrollTop() <= altura_del_content+altura_del_menu){
                $('.menu_block').removeClass('sticky');
                $('.content').css('padding-top', '0');
                $('.menu_block').css({'padding-bottom':'','padding-top':''});
            }
        }*/

    </script>
</body>
</html>
