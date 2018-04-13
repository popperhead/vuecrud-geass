<template>
    <div class="inrow"> 
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
            <tr v-for="user in users">
                <td>{{ user.id }}</td>
                <td>{{ user.name }}</td>
                <td>{{ user.email }}</td>
                <td>
                    <!-- <form :action="getUrl(user.id)" method="post">
                        <input type="hidden" name="_method" value="PUT">
                        <input type="submit" value="delete">
                    </form> -->
                    <button v-on:click="greet">Delete</button>
                </td>
                <td>
                    <!-- <form action="" method="post">
                        <input type="hidden" name="_method" value="PUT">
                        <input type="submit" value="Edit">
                    </form> -->
                    <button>Edit</button>
                </td>
                <td>
                    <!-- <for- action="" method="post">
                        <input type="hidden" name="_method" value="PUT">
                        <input type="submit" value="Update">
                    </form> -->
                    <button>Update</button>
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
                users: []
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
            getUrl(id) {
                return "/users/" +id;
            },
            greet: function (event) {
                
                alert('delete clicked');
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
</style>