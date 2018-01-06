<template>

    <div class="post-preview">

      <a :href="slug">
        <h2 class="post-title">
        {{ title }}
        </h2>
      </a>

        <h5 class="post-subtitle">
        {{ subtitle }}
        </h5>

      
      <p class="post-meta">
        Posted by  
        <a href="#">Mr Ofu - Hey Brother</a> 
        {{ created_at }}
         <span class="badge" style="background:silver; color:black">
         {{ likeCount }}
         </span>
         &nbsp; 
        <a href="" @click.prevent="likeIt">

         <i class="fa fa-thumbs-up" v-if="likeCount == 0"></i> 
         <i class="fa fa-thumbs-up" style="color:forestgreen" v-else=""></i> 

        </a>
      </p>

    </div>
  

</template>

<script>
    export default {

      data(){

        return {

          likeCount:0
        }

      },

      created(){

        this.likeCount = this.likes

      },
       
      props:[
      'title','subtitle','created_at','postId','login','likes','slug'
      ], 


      methods:{

         likeIt(){ 

        if(this.login){

      axios.post('/saveLike',{

        id : this.postId
        
        })
        
        .then(response => {
         //this.blog = response.data.data
         response.data == 'deleted'? this.likeCount-- : this.likeCount++;
        //console.log(response);
        })

        .catch(function (error){
          console.log(error);
        });

        }else{

          alert('You must first login')
          window.location = 'login'

        } 
      

    }


        }

     
 }


</script>
