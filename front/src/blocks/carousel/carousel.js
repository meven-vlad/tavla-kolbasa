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

