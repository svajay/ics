$.fn.imageSlider = function(options) {
  "use strict";
  
  // default options
  var defaults = {    
    sliderId: 1,                // unique slider id
    effect: 'fadeout',          // effect "fadeout" or "slide"
    delay: 5000,                // an integer indicating the number of milliseconds to delay execution of the next item in the queue
    fadeOut: 3000,              // a string or number determining how long the animation will run
    shuffle: false,             // randomizes the order of the photos in the gallery
    navButtons: false,          // navigation disabled
    progressBar: false,         // progressbar disabled
    verticalProgressBar: false, // false: horizontal, true: vertical prograsbar
    slideShow: true,            // slideshow enabled
    selectWithProgressBar: true // if it is enabled you change active photo with the progressbar too
  }
      
  // technical variables
  var that;                // plugin's object pointer
  var $srcPlugin;          // original DOM element's jquery pointer
  var $desPlugin;          // destination DOM element's jquery pointer (this build with this blugin)
  var isInProgress=false;  // animation is in progress (and tilt the interaction until finish)
  var timer;               // slideshow's timer
          
  
  this.shuffleArray = function(arr) {
    var i = arr.length, j, temp;
    if ( i == 0 ) return arr;
    while ( --i ) {
       j = Math.floor( Math.random() * ( i + 1 ) );
       temp = arr[i];
       arr[i] = arr[j];
       arr[j] = temp;
    }
    return arr;
  }
    
  /**
   * Load default config 
   **/
  this.loadDataFromConfig = function() {        
    that.opts = $.extend( {}, defaults, options );             
    that.sliderId  = that.opts['sliderId'];
    that.delay     = that.opts['delay'];
    that.duration  = that.opts['duration'];
    that.slideShow = that.opts['slideShow'];
  }
  
  /**
   * load images' urls from DOM
   */
  this.loadImages = function() {    
    var images = [];
    
    $srcPlugin.find('img').each(function() {
      images.push($(this).attr('src'));
    });          
    
    return images;
  }    
  
  /**
   * load data from original DOM
   *   - shuffle (random order) images (optional) 
   *   - open title
   */
  this.loadDataFromDOM = function() {        
    that.images = that.loadImages();      
    
    // random order
    if (that.opts['shuffle'] === true) {
      that.images = that.shuffleArray(that.images);  
    }
   
    that.idxLastImage = that.images.length-1;              
    
    that.title = $("#image-slider span").html() || '';                   
  }
  
  /**
   * Generate plugin's frame
   */
  this.createWrap = function() {
    that.$wrap = $('<div id="image-slider-'+that.sliderId+'-wrap"></div>');        
    that.$frame = [$('<div class="frame-0"></div>'), $('<div class="frame-1"></div>')];            
    var $frameText = $('<div class="frame-text">'+that.title+'</div>');        
    
    that.$wrap.append(that.$frame[0], that.$frame[1], $frameText);
    
    // init image sources in the slider divs    
    that.$frame[0].css('background-image', "url('"+that.images[0]+"')");
    that.$frame[1].css('background-image', "url('"+that.images[0]+"')");    
  }  
  
  /**
   * Add navigation
   *  - previous and next image button (optional)
   *  - close button (optional)
   */
  this.addNavigation = function() {
    // Add prev and next button
    if (that.opts.navButtons===true) {
      $('<button class="btn-prev"></button>').appendTo(that.$wrap);
      $('<button class="btn-next"></button>').appendTo(that.$wrap);                     
    }
    
    // add close button
    if (that.opts.onClose !== undefined) {
      $('<button class="btn-close"></button>').appendTo(that.$wrap);
    }       
  }
  
  /**
   * Add progressbar (optional)
   */
  this.addProgressBar = function() {     
    if (that.opts.progressBar===true) {      
      $('<div class="progress"><div class="indicator"></div></div>').appendTo(that.$wrap);                  
    }    
  }
  
  /**
   * Change photo with click on progressbar
   */
  this.clickProgressBar = function (e) {
    if (that.opts.selectWithProgressBar !== true || isInProgress) {          
      return 0;
    }
    
    if (that.opts.verticalProgressBar === true) {                        
      var percent = (100/that.$progressBar.height())*e.offsetY;    
    } else {
      var percent = (100/that.$progressBar.width())*e.offsetX;      
    }

    var idxImageOld = that.idxImage;
    that.idxImage = Math.floor(((that.idxLastImage+1)/100)*percent);

    if (idxImageOld != that.idxImage) { 
      var direction = that.idxImage < idxImageOld ? 'left' : 'right';
      that.slideImage(that.idxImage, direction);          
    }    
  }
  
  /**
   * Refresh progressbar's indicator
   */
  this.refreshIndicator = function() {
    var count = that.idxLastImage + 1;
    var unit =  (100 / count);
    var percent = unit * that.idxImage;    
    
    if (that.opts.verticalProgressBar === true) {            
      // vertival margin-top doesn't work with percent
      var percentByPixel = (that.$progressBar.height()/100)*percent;
      that.$indicator.height(unit+'%').css('margin-top', percentByPixel+'px');   
    } else {
      that.$indicator.width(unit+'%').css('margin-left', percent+'%');                 
    }
  }
  
  /**
   * Replace original DOM to generated HTML
   */
  this.replaceDOM = function() {  
    that.createWrap();        
    that.addNavigation();    
    that.addProgressBar();
         
    // replace original DOM with the generated
    $srcPlugin.after(that.$wrap);                 
    $srcPlugin.remove();     
        
    $desPlugin = $('#image-slider-'+that.sliderId+'-wrap');
    that.$progressBar = $desPlugin.find('.progress');    
    that.$indicator = $desPlugin.find('.indicator');     
    
    that.$progressBar.click(that.clickProgressBar);
  }
  
  /**
   * Close button trigger
   */
  this.closeTrigger = function() {     
    if (that.opts.onClose !== undefined) {
      $desPlugin.find('button.btn-close').on('click', function(e) {  
         that.opts.onClose.call($desPlugin, that.sliderId, that.idxImage);          
      });
    }      
  }
  
  /**
   * Slide trigger (when photo index change)
   */
  this.slideTrigger = function() {    
    if (that.opts.onSlide !== undefined) {      
       that.opts.onSlide.call($desPlugin, that.sliderId, that.idxImage);                
    }
  }        
  
  /**
   * Slide image (manual or automatic way)
   */
  this.slideImage = function(idx, direction) {    
    
    if (isInProgress) {
      return false;
    } else {
      isInProgress = true; 
    }        
        
    var $frame = that.$frame[that.idxFront]; // frame that you can see
    var $nextFrame = that.$frame[1-that.idxFront];  // the next frame that you can't see
    var nextImageUrl = that.images[that.idxImage];
    
    if (that.opts.effect !== 'slide') {
      // next photo send back and show
      $nextFrame
        .css('z-index', 0)    
        .css('background-image', "url('"+nextImageUrl+"')")
        .show();

      // actual photo send front and fadeout
      $frame
        .css('z-index', 1) 
        .stop()
        .fadeOut(that.duration, function() { 
              // change frame index
              that.idxFront = 1-that.idxFront;
              // trigger change photo
              that.slideTrigger();  
              isInProgress = false;
       });
     } else {
       // slide effect
       var width = $nextFrame.width();
                     
       $nextFrame.css('background-image', "url('"+nextImageUrl+"')");
       $nextFrame.css('left', direction=='left'?width:-width);
       
       $frame.animate({left: direction=='left'?-width:width}, that.opts.duration);
       $nextFrame.animate({left: 0}, that.opts.duration, function() {
          // change frame index
          that.idxFront = 1-that.idxFront;
          isInProgress = false;
          that.slideTrigger();  
       });
              
     }
       
      that.refreshIndicator();          
  }
  
  /**
   * Adding triggers to the next and the prev buttons
   */
  this.addNavigationTriggers = function() {
    this.cmdPrevButton = $desPlugin.find('button.btn-prev');
    this.cmdNextButton = $desPlugin.find('button.btn-next');
            
    this.cmdPrevButton.on('click', function() {            
      that.idxImage = that.idxImage < 1 ? that.idxLastImage : that.idxImage-1;               
      that.slideImage(that.idxImage, 'left');              
    });
        
    this.cmdNextButton.on('click', function() {      
      that.idxImage = that.idxImage > that.idxLastImage-1 ? 0 : that.idxImage+1;      
      that.slideImage(that.idxImage, 'right');
    });    
  }
  
  /**
   * Run slideshow with timer
   */
  this.runSlideShow = function() {
    if (isInProgress) {
      setTimeout(that.runSlideShow, that.delay);
      return false;
    }  
    
    that.idxImage = that.idxImage > that.idxLastImage-1 ? 0 : that.idxImage+1;      
    that.slideImage(that.idxImage, 'right');    
    setTimeout(that.runSlideShow, that.delay);
  }
  
  
  /**
   * Start plugin
   */
  this.init = function() {          
    
    that = this; // pointer to class properties    
    $srcPlugin = $(this); // pointer to original DOM
      
    that.idxImage = 0; // Active photo index                 
    that.idxFront = 1; // Active frame index  
    
    that.loadDataFromConfig();     
    that.loadDataFromDOM();    
    
    that.replaceDOM(); 
    
    that.closeTrigger(); 
    
    that.addNavigationTriggers();
                        
    // start timer
    if (that.slideShow) {
      that.runSlideShow();
    } else {    
      that.refreshIndicator();
    }
  }
  
  this.init();   
}  


function showEvent(message, sliderId, idxImage, color) {    
  $('#eventlog').prepend('<p style="color: '+color+'">'+(new Date).toLocaleTimeString()+': '+message+' [sliderId: '+sliderId+' idxImage:'+idxImage+']</p>');
}

// first slider
$('#image-slider').imageSlider({     
    delay: 3000,        // delay in milisecond 
    effect: 'fadeout',    // slider's effect
	fadeOut: 3000,
    duration: 3000,     // fade in milisecond    
    navButtons: false,   // enable left and right navigation
    progressBar: true,  // show progressbar      
    onSlide: function(sliderId, idxImage) {
      showEvent('Slide first&nbsp; slider.', sliderId, idxImage, '#448');   
    }
});
