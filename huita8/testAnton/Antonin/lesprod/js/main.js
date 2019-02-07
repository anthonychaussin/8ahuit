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

//Code pour le système de panier
function getCookie(name)
{
    var re = new RegExp(" panier" + "=([^;]+)");
    var value = re.exec(document.cookie);
    return (value != null) ? unescape(value[1]) : null;
}

var panier = [];

console.log(document.cookie);

console.log("panier récupéré")
console.log(getCookie(panier));
console.log(JSON.parse(getCookie(panier)));
panier = JSON.parse(getCookie(panier));

console.log(panier);

var prodPanier = class {
  constructor (idpp,qte){
    this.idpp = idpp;
    this.qte = qte;
  }
}

function getProduitPanierQuantity(idpp){
  let quantity = 0;
  panier.forEach(function(prod) {
    console.log(typeof prod.idpp+"=="+typeof idpp);
    console.log(prod.idpp+"=="+idpp);
    if (prod.idpp == idpp) {
      console.log("ça passe");
      quantity = prod.qte;
    }
  });
  console.log("ça passe pas");
  return quantity;
}

function setProduitPanierQuantity(idpp,qte){
  panier.forEach(function(prod) {
    if (prod.idpp == idpp) {
      prod.qte = qte;
      return true;
    }
  });
  return false;
}

function removeProduitPanier(idpp){
  let index = 0;
  panier.forEach(function(prod) {
    if (prod.idpp == idpp) {
      panier.splice(index, 1);
      return index;
    }
    index++;
  });
  return -1;
}

/* crée les compteur de prod*/
Vue.component('counter',{
    props: ['idProduit'],
    data: function() {
        return {
          count:getProduitPanierQuantity(this.idProduit)
        }
    },
    methods:{
      update:function(){
        console.log("count : "+this.count);
        console.log(panier);
        if(getProduitPanierQuantity(this.idProduit) == 0) {
          panier.push(new prodPanier(this.idProduit,this.count));
        }
        else if(this.count == 0){
          removeProduitPanier(this.idProduit);
        }
        else {
          setProduitPanierQuantity(this.idProduit,this.count);
        }
        var date = new Date();
        date.setTime(date.getTime() + 24 * 3600 * 1000);
        console.log("panier=" + JSON.stringify(panier) + "; expires = " + date.toUTCString() + "; path=/;");
        document.cookie = "panier=" + JSON.stringify(panier) + "; expires = " + date.toUTCString() + "; path=/;";
      },
      increment: function(){
        this.count ++;
        this.update();
      },
      decrement:function(){ 
        if (this.count > 0) {
          this.count --;
        }
        this.update();
      }
    },
    template:`<div>
    <button @click="decrement">-</button>
    <input type="text" v-bind:value="count" class="barreNbPro"></input>
    <button @click="increment">+</button>
    </div>`
})


/*pour afficher les donnée et autre*/
var dataURL = "http://10.103.1.202/~huitahuit/huita8/testAnton/Antonin/api/produits.json"
var dataURLTest = "http://10.103.1.202/~huitahuit/huita8/testAnton/Antonin/api/index.php"
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





