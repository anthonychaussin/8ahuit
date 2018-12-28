var show = true;
var mobile = false;

headbar = document.getElementById("headbar");
hbcolor = window.getComputedStyle(headbar, null).getPropertyValue("background-color");

if (hbcolor === "rgb(255, 165, 0)") {
    show = false;
    mobile = true;
}

var enteteHeight = document.getElementById("entete").offsetHeight;

window.onscroll = function() {

  if (window.pageYOffset > enteteHeight) {
    document.getElementById("sidenav").classList.add("sticky");
    document.getElementById("headspace").style.display = "block";
    if (!mobile) {
      document.getElementById("sidebar").style.top = "1cm";
    }
  } else {
    document.getElementById("sidenav").classList.remove("sticky");
    document.getElementById("headspace").style.display = "none";
    if (!mobile) {
      document.getElementById("sidebar").style.top = "260px";
    }
  }

}


var productListWidth = document.getElementById("product_list").offsetWidth;
var nbrColumns = Math.floor(productListWidth/200 - 1);
console.log("productListWidth " + productListWidth);
console.log(productListWidth/200);
console.log("nbrColumns " + nbrColumns);

if (nbrColumns > 1) {
  document.getElementById("product_list").style.gridTemplateColumns = "repeat(" + nbrColumns + ",auto)";
}



/* crée les compteur de prod*/
Vue.component('counter',{
    data: function() {
        return {count:0}
    },
    methods:{
    increment: function(){
        this.count ++
    },
    decrement:function(){
      
      if (this.count > 0) 
        this.count --
      
        
    }
    },
    template:`<div>
    <button @click="decrement">-</button>
    <input type="text" v-bind:value="count" class="barreNbPro"></input>
    <button @click="increment">+</button>
    </div>`
})

new Vue({
    el: "#app",
    mounted() {this.load();},
    data: {
        apiUrl: "../api/?",
        show: show    
    },
    methods: {
      load: function() {
      this.$http.get(this.apiUrl+"service=mesProd").then
        (function(response) {
          this.mesProd = response.body;
        });
      },
      laremise: function(){
        return false
      }

    }
    
})






