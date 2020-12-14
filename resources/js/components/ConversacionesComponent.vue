<template>
    <div>
        Conversaciones
        <v-btn
            text
            text-center
            v-on:click="logout"
            >Cerrar sesión
        </v-btn>
    </div>
</template>

<script>
    export default {
        mounted() {
            if(localStorage.getItem("authToken") === null){
                this.$router.push("/");
            }
            this.getConversaciones();
        },
        data:function(){
        	return{
        		conversaciones: [],
        	}
        },
        methods: {
            logout:function(){
                if(localStorage.getItem("authToken") !== null){
                    var temp_this = this;
                    axios({
                        method: 'get',
                        url: 'api/v1/auth/logout',
                        headers: {
                            Authorization: 'Bearer ' + localStorage.getItem("authToken"),
                        }
                    }).then(function (response) {
                        if(response.status == 200){
                            localStorage.clear();
                        }
                        console.log(response);
                    }).catch(function (error) {
                        console.log(error);
                    }).then(function(){
                        temp_this.$router.go(-1);
                    });
                }
            },
            getConversaciones:function(){
                var temp_this = this;
                axios({
                    method: 'get',
                    url: 'api/v1/conversacion',
                    headers: {
                        Authorization: 'Bearer ' + localStorage.getItem("authToken"),
                    }
                }).then(function (response){
                    temp_this.conversaciones = response.data.data;
                }).catch(function(error){
                    console.log(error);
                });
            }
        } 
    }
</script>