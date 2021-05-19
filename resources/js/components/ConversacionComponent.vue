<template>
    <div>
        <v-list-item>
            <v-avatar
                v-if="rel.para.relationship.imagen == null"
                color="primary"
                size="60">
                    <span class="white--text headline">
                        {{ rel.para.atributos.nombre[0].toUpperCase() }}
                    </span>
            </v-avatar>

            <v-list-item-avatar v-if="rel.para.relationship.imagen != null">
                <v-img :src="rel.para.relationship.imagen.links.self"></v-img>
            </v-list-item-avatar>

            <v-list-item-content>
                <v-list-item-title v-html="rel.para.atributos.nombre"></v-list-item-title>
                <v-list-item-subtitle v-html="atr.ultimo_mensaje"></v-list-item-subtitle>
            </v-list-item-content>
        </v-list-item>
        <v-divider></v-divider>
    </div>
</template>
<script>
    export default {
        props: {
			atributos: Object,
			relationships: Object
        },
        mounted() {
            /*this.Atr = {
                ultimo_mensaje: this.atributos.ultimo_mensaje,
                fecha_ultimo_mensaje: this.atributos.fecha_ultimo_mensaje,
                notificaciones: this.atributos.notificaciones,
                bloqueado: this.atributos.bloqueado,
            }*/
            this.atr = this.atributos;
            this.rel = this.relationships;
            this.getImagen();
        },
        data: function () {
            return {
                /*Atr:{
                    ultimo_mensaje: null,
                    fecha_ultimo_mensaje: null,
                    notificaciones: true,
                    bloqueado: false,
                },*/
                atr:null,
                rel: [],
            }
        },
        methods: {
            getImagen: function(){
                var temp_this = this;
                if(temp_this.rel.para.relationship != null){
                    axios({
                        method: 'get',
                        url: 'api/v1/usuario/'+temp_this.rel.para.id+'/imagen',
                        headers: {
                            Authorization: 'Bearer ' + localStorage.getItem("authToken"),
                        }
                    }).then(function (response) {
                        console.log(response);
                    }).catch(function (error) {
                        //console.log(error);
                    });
                }
            }
        }
    }
</script>
