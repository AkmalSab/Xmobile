 
//For NavBar


$(document).ready(function(){
			$('#search').click(function(){
				$('.menu-item').toggleClass('hide-item')
				$('.search-form').toggleClass('active')
				$('.close').toggleClass('active')	
			})
			
			$('.fa-bars').click(function(){
				
				$('ul').slideToggle();
				$('nav').toggleClass('active');
				$('.fa-bars').removeClass('active');
				$('.search-form').toggleClass('active');
				$('.close').removeClass('active');
			})
            
            $(window).resize(function(){
                if($(window).width > 768) {
                    $(".menu").removeAttr('style');
                }
            })
		})




//For ScrollTop


$(document).ready(function() {
        
        $(window).scroll(function(){
            
             if( $(this).scrollTop() >= 1000 ){
                 
                 $("#topBottn").fadeIn()
                 
             }else{
                 $("#topBottn").fadeOut( )
             }
        });
          
$("#topBottn").click(function(){
    
      $('html, body').animate({scrollTop :0},800);
    
});
    
    
        
});



//For Slider