$(window).scroll(function(){
    if( $(window).scrollTop() > 360){
      $(".sidenav").css("position","fixed")
      			   .css("top","0");
    }
    if( $(window).scrollTop() < 360){
      $(".sidenav").css("position","absolute")
      			   .css("top","360px")
    }
});
