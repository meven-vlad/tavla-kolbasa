function popupAjax(url){
  $.fancybox.open({
    type: 'ajax',
    src: url,
    touch: false,
    autoFocus: false,
    closeExisting: true
  })
}
