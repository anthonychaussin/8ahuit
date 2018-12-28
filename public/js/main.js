
/*Antonin Caillon */
/*Anton pas touche*/
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
        show: true,
        userData:[],
      filterCategory: 'lavage',
      filterTitle: undefined,
      


        
    },
    computed: {
    filteredPosts () {
      let posts = this.userData
      if (this.filterTitle) {
        posts = posts.filter((p) => {
          return p.lblproduit.toLowerCase().indexOf(this.filterTitle.toLowerCase()) !== -1
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


/*https://www.youtube.com/watch?v=PLi8sMA7sY8*/