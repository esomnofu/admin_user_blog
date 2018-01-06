
require('./bootstrap');

window.Vue = require('vue');

Vue.component('posts', require('./components/posts.vue'));


let url = window.location.href;

let pageNumber = url.split('=')[1];

console.log(pageNumber);



const app = new Vue({
    
    el: '#app',

    data:{
    	blog:{},
    },

    mounted(){

    	axios.post('/getPosts',{

    		'page' : pageNumber
    	})
    		.then(response => {
    			this.blog = response.data.data
    			//console.log(response);
    		})

    		.catch(function (error){
    			console.log(error);
    		});

    }

});
