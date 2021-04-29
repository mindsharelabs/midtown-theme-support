(function( root, $, undefined ) {
	"use strict";

	$(function () {



    $('.count-up').each(function() {
      var $this = $(this),
          countTo = $this.attr('data-count');

      $({ countNum: $this.text()}).animate({
        countNum: countTo
      },{
        duration: 3000,
        easing:'swing',
        step: function() {
          $this.text(Math.floor(this.countNum));
        },
        complete: function() {
          $this.text(this.countNum).digits();
        }
      });

    });

    $.fn.digits = function(){
      return this.each(function(){
          $(this).text( $(this).text().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,") );
      })
    }



  });


} ( this, jQuery ));
