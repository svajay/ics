<?php include('header.php'); ?>

            <div class="banner">
                <div class="overlay"></div>
                <div class="eventbanner"></div>
                <div class="mbeventbanner"></div>
              	<div class="caption container">
                  <h1 class="wow animate__ animate__fadeInUp animated" style="visibility: visible;">Event</h1>
               </div>
            </div>
            <!--banner-->
            <div class="placementgallerywrap padd100">
                <div class="container">
                  <div class="row">
                    <div class="col-lg-12">
                            <div class="gallerygridwrap eventwrap">
                   <input type="hidden" id="placed_gallery" value="1">
                    
       
                              
                        <div class="loadmore loeddd" >
                            <!--             <div class="svgbtn">-->
                            <!--   <a class="wow animate__ animate__fadeInUp load-button" href="javascript:;">LOAD MORE -->
                            <!--       <svg viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg">-->
                            <!--            <defs></defs>-->
                            <!--            <g data-name="Layer 2" id="Layer_2">-->
                            <!--              <g data-name="Layer 1" id="Layer_1-2">-->
                            <!--                <circle class="cls-1" cx="20" cy="20" r="19.75"></circle>-->
                            <!--                <polyline class="cls-2" points="16.87 14.62 22.73 20 16.87 25.38"></polyline>-->
                            <!--              </g>-->
                            <!--            </g>-->
                            <!--        </svg>-->
                            <!--    </a>-->
                            <!--</div>-->
                            
                </div>      
                  </div> 
              	</div>            
                  </div> 
              	</div>
              </div>
            <div class="clearfix"></div>
                

     <?php include('footer.php'); ?>
     <script>
    
    $(function(){loadmr(1);});
    
    function loadmr(pag){
    $('.loeddd').remove();
    
    var page=$('#placed_gallery').val();
    
    $.ajax({
		url:"placed_events.php",
		method:"POST",
		data:{pag:pag, page:page},
		success:function(response){
		    if(pag=='1'){
            $('#placed_gallery').val(parseInt($('#placed_gallery').val())+1)
            $(".gallerygridwrap").append(response);
		}
		}
});
    
}     
     
    
</script>           
        
