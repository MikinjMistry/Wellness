/* Recent posts carousel */


$(window).load(function(){
  $('.rps-carousel').carouFredSel({
    responsive: true,
    width: '100%',
    pauseOnHover : true,
    auto : true,
    setTimeout: 3000,
    circular  : true,
    infinite  : true,
    prev : {
      button  : "#car_prev",
      key   : "left",
    },
    next : {
      button  : "#car_next",
      key   : "right",
    },
    swipe: {
      onMouse: true,
      onTouch: true
    },
    items: {
      visible: {
        min: 1,
        max: 1
      }
    }
  });
});
