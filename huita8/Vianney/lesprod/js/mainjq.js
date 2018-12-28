$(window).scroll(function(){
    if( $(window).scrollTop() > 229.52){
      $(".sidenav").css("position","fixed")
      			   .css("top","0");
    }
    if( $(window).scrollTop() < 229.52){
      $(".sidenav").css("position","absolute")
      			   .css("top","229.52px")
    }
});
