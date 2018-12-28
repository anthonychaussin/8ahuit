Vue.component('selectionproduit',{
  data: function(){
    screenWidth: window.innerWidth
    buttonWidth : 25
    tailleSideNav: 200
    show: true
  },
  methods:
  {
    CalcSearchbarWitdh: function(){
      if (screenWidth < 1000) {
        var sbw = screenWidth - (buttonWidth * 2);
        var e = document.getElementsByClassName("searchbar");
        e.style.width = sbw+"px";
        console.log(e);
        //$(".searchbar").css("width",sbw);
      }
    }
  },
  template: `
    <mq-layout class="headnav">

      <div class="headnav">

        <button class="snopen" id="cat" @click="show = !show " >Catégories</button>
        <input class="searchbar" type="text" placeholder="Rechercher..">
        <button class="basket">Panier</button>

      </div>

      <div class="backnav"></div>

    </mq-layout>

    <transition name="slide-fade">

      <div class="sidenav" id="sidebar" v-if="show">

        <a class="snmenu" href="">Fruits</a>
        <a class="snmenu" href="">Légumes</a>
        <a class="snmenu" href="">Boissons</a>
        <a class="snmenu" href="">Bio</a>
        <a class="snmenu" href="">Conserves</a>
        <a class="snmenu" href="">Sec</a>
        <a class="snmenu" href="">Surgelé</a>
        <a class="snmenu" href="">Hygiène</a>

      </div>

    </transition>
  `
})

Vue.component('listeproduits',{
  data: function () {
    screenWidth: window.innerWidth
    tailleCaseProduit: 250
    tailleSideNav: 200
    nbrColumns: 2
  },
  methods:
  {
    CalcNbrColumns: function(){
      if (this.$mq == 'mobile' && this.screenWidth > tailleCaseProduit*2) {
        var decompteSW = this.screenWidth;
        while (decompteSW >= 0) {
          decompteSW -= tailleCaseProduit;
          this.nbrColumns++;
        }
        this.nbrColumns -= 3;
      }
      else if (this.$mq == 'desktop'){
        var decompteSW = this.screenWidth - tailleSideNav;
        while (decompteSW >= 0) {
          decompteSW -= tailleCaseProduit;
          this.nbrColumns++;
        }
        this.nbrColumns -= 3;
      }
      var gtc = "auto";
      var decompteColumns = nbrColumns - 1;
      while (decompteColumns >= 0 ) {
        gtc += " auto"
      }
      $('#listeproduits').css("grid-template-columns", gtc);
    }
  },
  template: `
    <div class="listeproduits">

    </div>
  `
})

Vue.component('vignremise', {
  data: function () {
    return {
                remise: true
            }
    },
   methods:
   {
        remis: function(){
          if (14 === 0) 
            {
              console.log('yousk2')
              this.remis = true
              
            }
          else
            {
            console.log('yousk2')
            this.remis = false
            }
            
        }
    },
  template: ` <p><span>Remise</span></p>  `
})

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
        show: true,

        
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




