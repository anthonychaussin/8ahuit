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
    console.log("sticky");
    document.getElementById("sidenav").classList.add("sticky");
    document.getElementById("headbar").style.marginTop = "-1cm";
    document.getElementById("headspace").style.display = "block";
    if (!mobile) {
      document.getElementById("sidebar").style.marginTop = "1cm";
    }
  } else {
    console.log("fixed");
    document.getElementById("sidenav").classList.remove("sticky");
    document.getElementById("headbar").style.marginTop = "0";
    document.getElementById("headspace").style.display = "none";
    if (!mobile) {
      document.getElementById("sidebar").style.marginTop = "1cm";
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
    props: {
      idproduit : Number
    }
    methods:{
    increment: function(){
      console.log(idproduit)
      this.count ++
    },
    decrement:function(){
      console.log(idproduit)
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
/*pour afficher les donnée et autre*/
var dataURL = "http://10.103.1.202/~huitahuit/huita8/Antonin/api/produits.json"
var dataURLTest = "http://10.103.1.202/~huitahuit/huita8/Antonin/api/index.php"
console.log(dataURLTest)
new Vue({
    el: "#app",
    mounted() {this.load(), 
      this.$http.get(dataURLTest).then(function(reponse)
      {
        console.log('succes',reponse)
      },function(reponse)
      {
        console.log('erreur',reponse)
      })},
    data: {
        show: show,
        userData:[],
      filterCategory: 'lavage',
      filterTitle: undefined,
      


        
    },
    computed: {
    filteredPosts () {
      let posts = this.userData
      if (this.filterTitle) {
        posts = posts.filter((p) => {
          return p.lblproduit.indexOf(this.filterTitle) !== -1
        })
      }
      if(this.filterCategory && this.filterCategory !== 'all') {
        posts = posts.filter((p) => {
          let foundCategory = p.lblcategorie.findIndex((c) => {
            return c === this.filterCategory
          })
          return foundCategory !== -1
        })
      }
      return posts
    }
  },
   
    methods: {
      load: function() {
      this.$http.get(dataURLTest).then(function(data){
        this.userData = data.data;
        });
    },
    laremise: function(){
      return false
    },


   
    

    }
    
})

/*https://blog.ippon.fr/2017/04/24/vue-js-2-0-petit-tutoriel-volume-1/*/





