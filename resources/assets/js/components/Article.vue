<template>
    <div class="container">        
        <div class="row">
            <div class="col-lg-12">
                <h1>Blog API using VUEJS</h1>
            </div>
            <div class="col-lg-12">
                <form class="form-control" @submit.prevent="createArticle" method="post">
                    <input class="form-control" type="text" v-model="title" placeholder="Enter Article Title Here">
                    <br/>
                    <textarea v-model="body" class="form-control" placeholder="Enter Article Body Here"></textarea>
                    <br/>
                    <input class="form-control" type="submit" value="Create Article">
                </form>
            </div>
            <div class="col-lg-2"></div>
            <div class="col-lg-10" style="margin-top:5vh;">
                <div v-for="(article, index) in articles" :key="article.id">
                    <span v-html="index+1"></span>
                    <b v-html="article.title"></b>
                    <p v-html="article.body"></p>
                    <button class="btn btn-danger" @click="deleteArticle(article.id)">Delete</button>                    
                    <button class="btn btn-success" @click="show(article.id,article.title,article.body)">Edit</button>
                </div>
            </div>
        </div>
        <template>
            <modal name="hello-world" :width="300" :height="300">
                <h2 style="text-align:center;">Edit this article</h2>
                <form class="form-control" @submit.prevent="edit(editid,edittitle,editbody)" method="post">
                    <input type="hidden" class="form-control" v-model="editid">
                    <input class="form-control" type="text" v-model="edittitle" placeholder="Enter Article Title Here">
                    <br/>
                    <textarea v-model="editbody" class="form-control" placeholder="Enter Article Body Here"></textarea>
                    <br/>
                    <input class="form-control" type="submit" value="Create Article">
                </form>
            </modal>
        </template>
    </div>
</template>
<script>
   
    export default {
        data: function () {
            return {
               title:'',
               body:'',
               articles:{},
               edittitle:'',
               editbody:'',
               editid:0,
            }
        },
        mounted() {
            this.fetchArticles();            
        },        
        methods: {
             show (id, title, body) {
                this.editid = id;
                this.edittitle = title;
                this.editbody = body;
                this.$modal.show('hello-world');
                
            },
            hide () {
                this.$modal.hide('hello-world');
            },
            //mounted method by default 
            fetchArticles: function(){
                axios.get('/fetch').then(response=>{
                this.articles = response.data;                
                }).catch(function(){
                    alert('Cannot Fetch Articles');
                });
            },            
            // method to add the new article in the database
            createArticle: function(){
                axios.post('/createarticle',{
                    title: this.title,
                    body: this.body
                }).then(response=>{
                    this.result = response.data;
                    this.fetchArticles();
                }).catch(function(){
                    alert('Error in creating a new article');
                });
            },
            edit: function(id,title,body){
                axios.post('/editarticle',{
                    id:id,
                    title:title,
                    body:body
                }).then(response=>{
                    this.editresult = response.data;
                    alert(this.editresult);
                }).catch(function(){
                    alert('Cannot Edit Article');
                });
            },
            deleteArticle: function(index){
                axios.post('/deletearticle',{
                    id: index
                }).then(response=>{
                    alert('Successfully Deleted Article');
                    this.fetchArticles();
                }).catch(function(){
                    alert('Cannot Delete Article');
                });
                
            }
        }
    }</script>