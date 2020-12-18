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

//=require ../blocks/**/*.js
