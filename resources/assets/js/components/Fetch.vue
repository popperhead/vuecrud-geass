<template>
    <div class="inrow">        
        <div class="col-3">ID</div>
        <div class="col-3">Name</div>
        <div class="col-3">Email</div>
        <div class="col-3">Phone</div>
        {{ applications }}
    </div>
</template>
<script>
  // Try using module.exports instead of export default
    export default
    {
        mounted(){
            this.getApplications();
        },
        methods: 
        {
            getApplications() {
            axios
                .get("/user")
                .then(response => {
                this.applications = response;
                });
            },
        }
    };
</script>
<style>
    .inrow{
        display:inline-flex;
        justify-content: center;
        align-items: center;
        width:100%;
        margin-left:5%;
    }
</style>