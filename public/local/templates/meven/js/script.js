"use strict";
// ----- FUNCTIONS
function scrollAnimateToBlock(event,block,offset){//block
  event.preventDefault();
  let dest = 0;
  let top = offset || 0;
  if (block){
    dest = $(block).offset().top + top;
  }
  $('html, body').animate({scrollTop: dest}, 700);
}

function missClick(selector,event){
  let div = $(selector);
  if (!div.is(event.target) && div.has(event.target).length === 0) {
    return true
  }else {
    return false;
  }
}

function initMask(){
  // (data-inputmask="'mask': '+7(999)999-99-99','clearIncomplete':'true'")
  $('[data-inputmask]').inputmask({
    showMaskOnHover: false
  });
}

// ------ MAIN
$(document).ready(function(){
  let deviceUser = device.default;

  //bsCustomFileInput.init();
  initMask();
});

document.addEventListener("DOMContentLoaded", function(){



  let arrows = ['<svg width="23" height="42" viewBox="0 0 23 42" fill="none" xmlns="http://www.w3.org/2000/svg">' +

  '<path d="M22 1L2 21L22 41" stroke="currentColor" stroke-width="2"/>' +

  '</svg>','<svg width="23" height="42" viewBox="0 0 23 42" fill="none" xmlns="http://www.w3.org/2000/svg">' +

  '<path d="M1 1L21 21L1 41" stroke="currentColor" stroke-width="2"/>' +

  '</svg>'];



  Array.from(document.querySelectorAll('.js-carousel-card')).forEach(function(el,i){

    let carousel = tns({

      container: el,

      items: 1,

      speed: 500,

      gutter: 24,

      nav: false,

      navPosition: 'bottom',

      controls: true,

      controlsText: arrows,

      mouseDrag: true,

      preventScrollOnTouch: 'auto',

      swipeAngle: 25,

      touch: true,

      loop: true,

      responsive: {

        576: {

          items: 2

        },

        768: {

          items: 3,

          nav: true

        },

        992: {

          items: 4

        }

      },

      onInit: function(slider){



      }

    });

  });



});






document.addEventListener("DOMContentLoaded", function(){



  let arrows = ['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'];



  Array.from(document.querySelectorAll('#front-slider')).forEach(function(el,i){

    let carousel = tns({

      container: el,

      mode: 'gallery',

      items: 1,

      speed: 500,

      gutter: 0,

      nav: true,

      navContainer: '#front-nav',

      controls: false,

      mouseDrag: true,

      preventScrollOnTouch: 'auto',

      swipeAngle: 25,

      touch: true,

      loop: false,

      rewind: true,

      autoplay: true,

      autoplayTimeout: 10000,

      autoplayButtonOutput: false,

      autoplayHoverPause: false,

      onInit: function(slider){



      }

    });

  });



});







function popupAjax(url){

  $.fancybox.open({

    type: 'ajax',

    src: url,

    touch: false,

    autoFocus: false,

    closeExisting: true

  })

}


