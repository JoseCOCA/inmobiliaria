<!--==============================Bot_block=================================-->
<!--==============================footer=================================-->
<footer> 
  <div class="container_12">
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatem, voluptate veritatis porro, minima commodi esse. Commodi maiores repudiandae quisquam enim qui autem sed nisi odit facilis, ipsa illo magnam, praesentium!</p>
  </div>  
  <div class="clear"></div>
  <div class="sep__1"></div>
  <div class="foot_colourd"></div>
</footer>
<script type="text/javascript" src="assets/js/jquerypp.custom.js"></script>
    <script type="text/javascript" src="assets/js/jquery.elastislide.js"></script>
    <script type="text/javascript">
      
      $( '#carousel' ).elastislide( {
        minItems : 8
      } );
      jQuery(document).ready(function () {
                /*Sticky bar*/
         var stickyNavTop = $('.menu_block').offset().top;  

         var stickyNav = function(){  
            var scrollTop = $(window).scrollTop();  

            if (scrollTop > stickyNavTop) {   
               $('.menu_block').addClass('sticky');  
            } else {  
               $('.menu_block').removeClass('sticky');   
            }  
         };  

         stickyNav();  

         $(window).scroll(function() {  
            stickyNav();  
         });
      /*//Sticky bar*/       

      })


    </script>
</body>
</html>
