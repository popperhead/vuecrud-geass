<template>
   <div id="app">
     
     <vue-editor v-model="content"></vue-editor>    
     <div v-html="content"></div>
     <button class="btn btn-success" @click.prevent="saveContent()">Save Content</button>                   
   </div>
 </template>

<script>
  import { VueEditor } from 'vue2-editor'

export default 
{

  components: {
    VueEditor
  },
  data() 
  {     
    return {
      content: '<h1>Write Your Content Here</h1>',
      htmlForEditor: ''
    }
  },
  methods:
  {     
            saveContent: function(event) {
                console.log(this.content);
                //alert('saved');
            }
  }
}
 </script>