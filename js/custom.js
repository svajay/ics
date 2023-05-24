wow = new WOW({
    boxClass: "wow", // default
    animateClass: "animated", // default
    offset: 0, // default
    mobile: true, // default
    live: true, // default
});
wow.init();
$('[data-fancybox]').fancybox({
    	loop : true
    });
var btn = $('#topbtn');
    $(window).scroll(function() {
      if ($(window).scrollTop() > 900) {
        btn.addClass('show').fadeIn();
      } else {
        btn.removeClass('show').fadeOut();
      }
    });

    btn.on('click', function(e) {
      e.preventDefault();
      $("html, body").animate({ scrollTop: 0 }, 1000); 
      return false; 
    });

$('.aboutnavclick').click(function(){
   $('.showaboutsubnav').toggleClass('shownavsub');
  $('.showimportantsubnav').removeClass('shownavsub');
});

$('.importantclick').click(function(){
   $('.showimportantsubnav').toggleClass('shownavsub');
  $('.showaboutsubnav').removeClass('shownavsub');
});

$('.mediaclick').click(function(){
   $('.mediaopen').toggleClass('mediashow');
});

$('.mobmedia').click(function(){
   $('.mediamobopen').toggleClass('mediamobopenshow');
}); 

$('.confclick').click(function(){
   $('.confopen').toggleClass('confshow');
});

$('.mobconf').click(function(){
   $('.confmobopen').toggleClass('confmobopenshow');
}); 





// Hide header on scroll down
var didScroll;
var lastScrollTop = 0;
var delta = 5;
var navbarHeight = $('header').outerHeight();
$(window).scroll(function(event){
    didScroll = true;
});
setInterval(function() {
    if (didScroll) {
        hasScrolled();
        didScroll = false;
    }
}, 250);
function hasScrolled() {
    var st = $(this).scrollTop();
    
    // Make scroll more than delta
    if(Math.abs(lastScrollTop - st) <= delta)
        return;    
    // If scrolled down and past the navbar, add class .nav-up.
    if (st > lastScrollTop && st > navbarHeight){
        // Scroll Down
        $('header').removeClass('slideshow').addClass('slideup');
    } else {
        // Scroll Up
        if(st + $(window).height() < $(document).height()) {
            $('header').removeClass('slideup').addClass('slideshow');
        }
    }
  
    lastScrollTop = st;
}

$('.navbtn').click(function(){
    $('.rightnavmob').toggleClass("shownavlink");
    $(this).toggleClass('close');
 //$('.rightnavmob').removeClass('shownavlink');
});

$('.hidediv').click(function(){
    $('.openbtn').removeClass('close');
});

$('.certificateslider').slick({
  	slidetoshow: 3,
  	 slidesToShow: 3,
  slidesToScroll: 1,
    dots:false,
    autoplay:true,
    autoplaySpeed:3000,
    speed:900,
    fade: false,
    infinite: true,
    cssEase: 'ease-in-out',
  responsive: [
    {
      breakpoint: 992,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
    
  ],
});
$('.arrow-icon-leftpl').click(function(){
  $('.certificateslider').slick('slickPrev');
});

$('.arrow-icon-rightpl').click(function(){
  $('.certificateslider').slick('slickNext');
}); 


$('.innerslidergridone').slick({
    dots:false,
    autoplay:true,
    autoplaySpeed:5000,
    speed:900,
    prevArrow: false,
    nextArrow: false,
    fade: false,
    infinite: true,
    cssEase: 'ease-in-out',
});


$('.innerslidergridtwo').slick({
    dots:false,
    autoplay:true,
    autoplaySpeed:6000,
    speed:900,
    prevArrow: false,
    nextArrow: false,
    fade: false,
    infinite: true,
    cssEase: 'ease-in-out',
});

$('.gridresponsive').slick({
  dots: false,
  //infinite:true,
  slidesToShow:4,
  slidesToScroll: 1,
  centerMode: false,
  //autoplay: true,
  autoplaySpeed: 3000,
  speed: 1200,
  pauseOnHover: false,
  //cssEase: 'linear',
  //variableWidth: true, 
  prevArrow: true,
  nextArrow: true,
  prevArrow: '<button type="button" data-role="none" class="slick-prev" aria-label="Previous" tabindex="0" role="button"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 40 40"><defs></defs><g id="Layer_2" data-name="Layer 2"><g id="Layer_1-2" data-name="Layer 1"><circle class="cls-1" cx="20" cy="20" r="19.75"/><polyline class="cls-2" points="23.13 14.62 17.27 20 23.13 25.38"/></g></g></svg></button>',
  nextArrow: '<button type="button" data-role="none" class="slick-next" aria-label="Next" tabindex="0" role="button"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 40 40"><defs></defs><g id="Layer_2" data-name="Layer 2"><g id="Layer_1-2" data-name="Layer 1"><circle class="cls-1" cx="20" cy="20" r="19.75"/><polyline class="cls-2" points="16.87 14.62 22.73 20 16.87 25.38"/></g></g></svg></button>',

  responsive: [{
          breakpoint: 1024,
          settings: {
              slidesToShow: 3,
              slidesToScroll: 1,
              // centerMode: true,

          }

      }, {
          breakpoint: 800,
          settings: {
              slidesToShow: 2,
              slidesToScroll: 1,
              dots: false,
              infinite: true,

          }


      }, {
          breakpoint: 600,
          settings: {
              slidesToShow: 1,
              slidesToScroll: 1,
              dots: false,
              infinite: true,
              
          }
      }, {
          breakpoint: 480,
          settings: {
              slidesToShow: 1,
              slidesToScroll: 1,
              dots: false,
              infinite: true,
              autoplay: true,
              autoplaySpeed: 1000,
          }
      }]
});

$('.gridplacegallery').slick({
  dots: false,
  infinite:true,
  slidesToShow:3,
  slidesToScroll:1,
  centerMode: false,
  autoplay: true,
  autoplaySpeed: 3000,
  speed: 1200,
  pauseOnHover: false,
  //cssEase: 'linear',
  //variableWidth: true, 
  prevArrow: true,
  nextArrow: true,
  prevArrow: '<button type="button" data-role="none" class="slick-prev" aria-label="Previous" tabindex="0" role="button"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 40 40"><defs></defs><g id="Layer_2" data-name="Layer 2"><g id="Layer_1-2" data-name="Layer 1"><circle class="cls-1" cx="20" cy="20" r="19.75"/><polyline class="cls-2" points="23.13 14.62 17.27 20 23.13 25.38"/></g></g></svg></button>',
  nextArrow: '<button type="button" data-role="none" class="slick-next" aria-label="Next" tabindex="0" role="button"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 40 40"><defs></defs><g id="Layer_2" data-name="Layer 2"><g id="Layer_1-2" data-name="Layer 1"><circle class="cls-1" cx="20" cy="20" r="19.75"/><polyline class="cls-2" points="16.87 14.62 22.73 20 16.87 25.38"/></g></g></svg></button>',

  responsive: [{
          breakpoint: 1024,
          settings: {
              slidesToShow: 3,
              slidesToScroll: 1,
              // centerMode: true,

          }

      }, {
          breakpoint: 800,
          settings: {
              slidesToShow: 2,
              slidesToScroll: 1,
              dots: false,
              infinite: true,

          }


      }, {
          breakpoint: 600,
          settings: {
              slidesToShow: 1,
              slidesToScroll: 1,
              dots: false,
              infinite: true,
              
          }
      }, {
          breakpoint: 480,
          settings: {
              slidesToShow: 1,
              slidesToScroll: 1,
              dots: false,
              infinite: true,
              autoplay: true,
              autoplaySpeed: 1000,
          }
      }]
});


  $('.review-slider').slick({
        // dots: true,
        autoplay: true,
        autoplaySpeed: 2000,
        infinite: true,
        speed: 300,
        slidesToShow: 3,
        slidesToScroll:-1,
        prevArrow: true,
        nextArrow: true,
        prevArrow: '<button type="button" data-role="none" class="slick-prev" aria-label="Previous" tabindex="0" role="button"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 40 40"><defs></defs><g id="Layer_2" data-name="Layer 2"><g id="Layer_1-2" data-name="Layer 1"><circle class="cls-1" cx="20" cy="20" r="19.75"/><polyline class="cls-2" points="23.13 14.62 17.27 20 23.13 25.38"/></g></g></svg></button>',
        nextArrow: '<button type="button" data-role="none" class="slick-next" aria-label="Next" tabindex="0" role="button"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 40 40"><defs></defs><g id="Layer_2" data-name="Layer 2"><g id="Layer_1-2" data-name="Layer 1"><circle class="cls-1" cx="20" cy="20" r="19.75"/><polyline class="cls-2" points="16.87 14.62 22.73 20 16.87 25.38"/></g></g></svg></button>',
        responsive: [{
            breakpoint: 1200,
            settings: {
            slidesToShow: 2,
            slidesToScroll: 2,
            arrows: false,
            prevArrow: false,
            nextArrow: false,

            }

        }, {
            breakpoint: 800,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 2,
                dots: false,
                infinite: true,

            }


        }, {
            breakpoint: 600,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
                dots: false,
                infinite: true,
                
            }
        }, {
            breakpoint: 200,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
                dots: false,
                infinite: true,
                autoplay: true,
                autoplaySpeed: 2000,
            }
        }]
    });

if ($(window).width() > 800) {

$('.recruiters_slider1').slick({
    dots: false,
    infinite:true,
    slidesToShow:6,
    slidesToScroll:-1,
    autoplay: true,
    autoplaySpeed: 0,
    speed: 5000,
    cssEase: 'linear', 
    prevArrow: false,
    nextArrow: false, 
    initialSlide: 1,
    draggable: true,
    responsive: [{
            breakpoint: 1024,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 1,
                // centerMode: true,
  
            }
  
        }, {
            breakpoint: 800,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 1,
                dots: false,
                infinite: true,
  
            }
  
  
        }, {
            breakpoint: 600,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 1,
                dots: false,
                infinite: true,
                
            }
        }, {
            breakpoint: 480,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 1,
                dots: false,
                infinite: true,
                autoplay: true,
                autoplaySpeed: 1000,
            }
        }]
  });
  
 $('.recruiters_slider2').slick({
    dots: false,
    infinite:true,
    slidesToShow:5,
    slidesToScroll:-1,
    autoplay: true,
    autoplaySpeed: 0,
    speed: 5000,
    cssEase: 'linear', 
    prevArrow: false,
    nextArrow: false, 
    initialSlide: 1,
    draggable: true,
    responsive: [{
            breakpoint: 1024,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 1,
                // centerMode: true,
  
            }
  
        }, {
            breakpoint: 800,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 1,
                dots: false,
                infinite: true,
  
            }
  
  
        }, {
            breakpoint: 600,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 2,
                dots: false,
                infinite: true,
                
            }
        }, {
            breakpoint: 480,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
                dots: false,
                infinite: true,
                autoplay: true,
                autoplaySpeed: 1000,
            }
        }]
  });

const sliderhone = $(".clientlogoslideone");
sliderhone.on('wheel', (function(e) {
  var slideCount = $(this)[0].slick["slideCount"];
  var currentIndex = $(this).slick("slickCurrentSlide");
  var totalSildeToShow =  $(this)[0].slick.options["slidesToShow"];
  if (e.originalEvent.deltaY < 0) {
    e.preventDefault();
    $(this).slick('slickPrev');
  } else {
    if (slideCount - totalSildeToShow === currentIndex)
      return;
    e.preventDefault();
    $(this).slick('slickNext')
  }
}));

const sliderhtwo = $(".clientlogoslidetwo");
sliderhtwo.on('wheel', (function(e) {
  var slideCount = $(this)[0].slick["slideCount"];
  var currentIndex = $(this).slick("slickCurrentSlide");
  var totalSildeToShow =  $(this)[0].slick.options["slidesToShow"];
  if (e.originalEvent.deltaY < 0) {
    e.preventDefault();
    $(this).slick('slickPrev');
  } else {
    if (slideCount - totalSildeToShow === currentIndex)
      return;
    e.preventDefault();
    $(this).slick('slickNext')
  }
}));


const sliderpone = $(".recruiters_slider1");
sliderpone.on('wheel', (function(e) {
  var slideCount = $(this)[0].slick["slideCount"];
  var currentIndex = $(this).slick("slickCurrentSlide");
  var totalSildeToShow =  $(this)[0].slick.options["slidesToShow"];
  if (e.originalEvent.deltaY < 0) {
    e.preventDefault();
    $(this).slick('slickPrev');
  } else {
    if (slideCount - totalSildeToShow === currentIndex)
      return;
    e.preventDefault();
    $(this).slick('slickNext')
  }
}));

const sliderptwo = $(".recruiters_slider2");
sliderptwo.on('wheel', (function(e) {
  var slideCount = $(this)[0].slick["slideCount"];
  var currentIndex = $(this).slick("slickCurrentSlide");
  var totalSildeToShow =  $(this)[0].slick.options["slidesToShow"];
  if (e.originalEvent.deltaY < 0) {
    e.preventDefault();
    $(this).slick('slickPrev');
  } else {
    if (slideCount - totalSildeToShow === currentIndex)
      return;
    e.preventDefault();
    $(this).slick('slickNext')
  }
}));

}
if ($(window).width() < 799) {
$('.recruiters_slider1').slick({
    dots: false,
    infinite:true,
     slidesToShow:2,
    slidesToScroll:1,
    autoplay: true,
    autoplaySpeed: 5000,
    speed: 1000, 
    prevArrow: false,
    nextArrow: false,
    draggable: true,
  });

 $('.recruiters_slider2').slick({
    dots: false,
    infinite:true,
     slidesToShow:2,
    slidesToScroll:1,
    autoplay: true,
    autoplaySpeed: 5000,
    speed: 1000, 
    prevArrow: false,
    nextArrow: false,
    draggable: true,
  });
    
}

$(function () {
		$(".more_innovationt").slice(0, 6).show();
		$("body").on('click touchstart', '.innovationt-button', function (e) {
			e.preventDefault();
			$(".more_innovationt:hidden").slice(0, 3).slideDown();
			if ($(".more_innovationt:hidden").length == 0) {
				$(".innovationt-button").css('display', 'none');
			}
			
		});
	});
$(".show_dell").on("click", function(){
  $(".mask").addClass("active");
});
function closeModal(){
  $(".mask").removeClass("active");
}
$(".close, .mask").on("click", function(){
  closeModal();
});

$(function () {
	$(".more_gallery").slice(0, 7).show();
	$("body").on('click touchstart', '.load-button', function (e) {
		e.preventDefault();
		$(".more_gallery:hidden").slice(0, 2).slideDown();
		if ($(".more_gallery:hidden").length == 0) {
			$(".load-button").css('display', 'none');
		}
		
	});
});

$(document).keyup(function(e) {
  if (e.keyCode == 27) {
    closeModal();
  }
});	

$('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
  $('.recruiters_slider1').slick('setPosition');
  $('.recruiters_slider2').slick('setPosition');
  $('.recruiters_slider3').slick('setPosition');
})

$('.dpharmff').click(function(){
  $('.dpharmashow').addClass('show');
  $('.dpharmashow').addClass('active');
  $('.dropdownmpharm').css('display','none');
  $('.dropdownbpharm').css('display','none');
  $('.mbpharm').removeClass('show');
  $('.mbpharm').removeClass('active');
  $('#myTab2 li a').removeClass('active');
  $('#myTab3 li a').removeClass('active');
});
$('.openbpharm').click(function(){
  $('.dropdownbpharm').css('display','block');
  $('.dropdownmpharm').css('display','none');
  $('#myTab li a').removeClass('active');
  $('#myTab3 li a').removeClass('active');
});
$('.openmpharm').click(function(){
  $('.dropdownmpharm').css('display','block');
  $('.dropdownbpharm').css('display','none');
  $('#myTab li a').removeClass('active');
  $('#myTab2 li a').removeClass('active');
});

$('.openwhy').click(function(){
  $('.dropdownwhy').css('display','block');
  $('#myTab5 li a').removeClass('active');
  $('#myTab6 li a').removeClass('active');
  $('.mbpharm').removeClass('show');
  $('.mbpharm').removeClass('active');
  $('#RECOGNITION').addClass('show');
  $('#RECOGNITION').addClass('active');
  $('#why-tab-1').addClass('active');
});
 $('#myTab5 li a').click(function(){
   $('#myTab3 li a').removeClass('active');
   $('#myTab6 li a').removeClass('active');
   $('.dropdownwhy').css('display','none');
 });
 $('#myTab6 li a').click(function(){
   $('#myTab3 li a').removeClass('active');
   $('#myTab5 li a').removeClass('active');
   $('.dropdownwhy').css('display','none');
 });

$('.paymentfirstbtn').on('click', function(){
  $('.firstgridsidebtn').toggleClass('showfirst');
  $('.admissionwrap').removeClass('showaddmission');
  $('.paymentfirstbtn').toggleClass('btnactive');
  $('.admissionopen,.enquiry').removeClass('btnactive');
});


