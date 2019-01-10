var c = document.getElementById("c");
var ctx = c.getContext("2d");
var w = window.innerWidth;
var h = 276;
ctx.beginPath();
ctx.moveTo(0, h);
ctx.lineTo(h*0.35, w*0.33);
ctx.lineTo(h, w*0.33);
ctx.fill();