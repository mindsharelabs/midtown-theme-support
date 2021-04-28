(function( root, $, undefined ) {
	"use strict";

	$(function () {

    $(document).ready(function(){
      $('.midtown-testimonial-slider').slick({
        dots: true,
        arrows: true,
  		  infinite: true,
  		  speed: 300,
  		  slidesToShow: 1,
  		  adaptiveHeight: false,
  			nextArrow: $('.front-slide-next'),
  			prevArrow: $('.front-slide-prev'),
  			appendDots: $(".front-slide-dots"),
      });
    });



  });


} ( this, jQuery ));
