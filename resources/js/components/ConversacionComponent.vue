<template>
    <div>
        {{ rel.para.atributos.nombre }}
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
        }
    }
</script>
