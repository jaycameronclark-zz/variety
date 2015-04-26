/*
  Module Pattern JS
  Namespace: App
*/

var App = (function(){
  
  return {

  	mobileMenu: function () {
		  $('.js-menu-trigger').on('click touchstart', function(e){
		    $('.js-menu').toggleClass('is-visible');
		    $('.js-menu-screen').toggleClass('is-visible');
		    e.preventDefault();
		  });

		  $('.js-menu-screen').on('click touchstart', function(e){
		    $('.js-menu').toggleClass('is-visible');
		    $('.js-menu-screen').toggleClass('is-visible');
		    e.preventDefault();
		  });
  	},

  	lightbox: function () {
  	  $(".fancybox").fancybox({
  	    beforeLoad: function() {
  	    },
  	    afterShow: function() {
  	    },
  	    openEffect  : 'fade',
  	    closeEffect : 'fade',
  	    openSpeed : 'slow',
  	    nextSpeed : 'slow',
  	    prevSpeed : 'slow',
  	    showEarly  : false,
  	    nextEffect : 'elastic',
  	    prevEffect : 'elastic',
  	    loop: false,
  	    helpers : {
  	        title: {
  	            position: 'top',
  	            type: 'over'
  	        }            
  	    } 
  	  });
  	  $('.fancybox-media').fancybox({
  	  	openEffect  : 'none',
  	  	closeEffect : 'none',
  	  	helpers : {
  	  		media : {}
  	  	}
  	  });
  	  $(".various").fancybox({
  	  	maxWidth	: 800,
  	  	maxHeight	: 800,
  	  	fitToView	: false,
  	  	width		: '80%',
  	  	height		: '80%',
  	  	autoSize	: false,
  	  	closeClick	: false,
  	  	openEffect	: 'none',
  	  	closeEffect	: 'none'
  	  });
  	}

  };

}());


App.mobileMenu();
App.lightbox();
