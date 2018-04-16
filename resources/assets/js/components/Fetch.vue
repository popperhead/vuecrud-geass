<template>
    <div class="inrow">        
        <button class="add" data-toggle="modal" data-target="#myModal">Add</button>
        <!-- Modal -->
        <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Add New Record</h4>                         
                    </div>
                    <div class="modal-body">
                        <div class="inrow">
                            {{ log }}
                            <form v-on:submit="sub">
                                <input type="text" v-model="name" name="name" placeholder="Enter Name Here" >
                                <input type="text" v-model="email" name="email" placeholder="Enter Email Here" >                        
                                <button type="submit">Add New Record</button>
                            </form>
                        </div>
                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>    
        <table class="table table-bordered table-striped">
            <thead>
            <tr>

                <th>id</th>
                <th>name</th>
                <th>email</th>
                <th>Delete</th>
                <th>Edit</th>
                <th>Update</th>
            </tr>
            </thead>
            <tbody>
            
            
            <tr v-for="user in users" :key="user.id">
                <td>{{user.id}}</td>
                <td>{{user.name}}</td>
                <td>{{user.email}}</td>
                <td>
                    <!-- <form :action="getUrl(user.id)" method="post">
                        <input type="hidden" name="_method" value="PUT">
                        <input type="submit" value="delete">
                    </form> -->
                    <button @click="del(user, user.id)">Delete</button>
                </td>
                <td>
                    <!-- <form action="" method="post">
                        <input type="hidden" name="_method" value="PUT">
                        <input type="submit" value="Edit">
                    </form> -->
                    <button @click="edit(user, user.id)">Edit</button>
                </td>
                <td>
                    <!-- <for- action="" method="post">
                        <input type="hidden" name="_method" value="PUT">
                        <input type="submit" value="Update">
                    </form> -->
                    <button @click="upd(user, user.id)">Update</button>
                </td>
            </tr>
            </tbody>
        </table>            
        
    </div>
</template>
<script>
    export default {
        data: function () {
            return {
                users: [],
                showadd:false,
                name:"",
                email:"",
                log:"",
            }
        },
        mounted() {
            var app = this;
            
            axios.get('/user')
                .then(function (resp) {
                    app.users = resp.data;
                })
                .catch(function (resp) {
                    console.log(resp);
                    alert("Could not load users");
                });
        },     
        
        methods: {
            del: function(user, id) {
                axios.delete('/user/'+id)
                .then(function (resp) {                    
                    console.log(id);
                    window.location.reload(true);
                    
                })
                .catch(function (resp) {
                    console.log(resp);
                    alert("Cannot Delete the User");
                });
                                
            },
            edit: function() {
                //var x = $this('.delete').val();
                alert("Edit clicked");
            },
            upd: function() {
                //var x = $this('.delete').val();
                alert("Update clicked");
            },
            add: function() {
                //var x = $this('.delete').val();
                alert("Add clicked");
            },
            sub: function(event){
          
                if(this.name == "" || this.email == ""){
                    
                    this.log = "Empty Inputs Please Enter Some Value";
                    event.preventDefault();
                }else{
                    this.log = this.name +' ' +this.email;
                    axios.get('/user/create/',{
                        params: {
                        name: this.name,
                        email: this.email
                        }      
                    })
                    .then(function (resp) {                    
                        console.log('inserted'+resp);                        
                        window.location.reload(true);
                    })
                    .catch(function (resp) {
                        console.log(resp);
                        alert("Cannot add new User");
                    });
                    event.preventDefault();
                }   
            }        
        }
    }
</script>
<style>
    .inrow{
        display:inline-flex;
        justify-content: center;
        align-items: center;
        width:auto;
        margin-left:5%;
    }


    .myModal{
    	position:fixed;
    	top:0;
    	left:0;
    	right:0;
    	bottom:0;
    	background: rgba(0, 0, 0, 0.4);
    }
     
    .modalContainer{
    	width: 555px;
    	background: #FFFFFF;
    	margin:auto;
    	margin-top:50px;
    }
     
    .modalHeader{
    	padding:10px;
    	background: #008CBA;
    	color: #FFFFFF;
    	height:50px;
    	font-size:20px;
    	padding-left:15px;
    }
     
     
    .modalBody{
    	padding:40px;
    }
     
    .modalFooter{
    	height:36px;
    }
     
    .footerBtn{
    	margin-right:10px;
    	margin-top:-9px;
    }
     
    .closeBtn{
    	background: #008CBA;
    	color: #FFFFFF;
    	border:none;
    }
</style>