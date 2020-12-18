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
