
/*Pour afficher la remise*/
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
/*pour afficher les donnée et autre*/
var dataURL = "http://10.103.1.202/~huitahuit/huita8/Antonin/api/produits.json"


new Vue({
    el: "#app",
    mounted() {this.load(), 
      this.$http.get(dataURL).then(function(reponse)
      {
        console.log('succes',reponse)
      },function(reponse)
      {
        console.log('erreur',reponse)
      })},
    data: {
        show: true,
        userData:[],
        selectCatego: undefined
       

        
    },
   
    methods: {
      load: function() {
      this.$http.get(dataURL).then(function(data){
        this.userData = data.data;
        });
    },
    laremise: function(){
      return false
    },
    selectionChanged: function() {
      console.log('selectionChanged:this.selectCatego', this.selectCatego);
    }
   
    

    }
    
})

