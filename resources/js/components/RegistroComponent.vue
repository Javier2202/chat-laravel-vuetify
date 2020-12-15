<template>
    <div>        
        <v-row>
            <v-col
                cols="12">
                <h1>Registro</h1>
            </v-col>
            <v-col
                cols="8"
                offset="2">
                <v-form>
                    <v-file-input
                        v-model="imagen"
                        accept="image/png, image/jpeg, image/jpg,"
                        show-size
                        placeholder="Imagen"
                        prepend-icon="mdi-camera"
                        label="Perfil"
                    ></v-file-input>
                    <v-text-field
                        v-model="name"
                        label="Nombre completo"
                        required>
                    </v-text-field>
                    <v-text-field
                        v-model="email"
                        label="Correo electronico"
                        required>
                    </v-text-field>
                    <v-text-field
                        v-model="password"
                        label="Contraseña"
                        required
                        :append-icon="show_password ? 'mdi-eye' : 'mdi-eye-off'"
                        :type="show_password ? 'text' : 'password'"
                        class="input-group--focused"
                        @click:append="show_password = !show_password">
                    </v-text-field>

                    <v-btn
                        v-on:click="registrar"
                        color="green">
                        Registrar
                    </v-btn>
                    <v-btn
                        v-on:click="limpiar"
                        color="orange">
                        Limpiar
                    </v-btn>
                    <v-btn
                        color="red"
                        :to="{name:'home'}">
                        Cancelar
                    </v-btn>
                </v-form>
            </v-col>
            <v-col
                cols="12">
                <v-bottom-sheet v-model="show_msj">
                    <v-sheet
                        class="text-center"
                        height="200px">
                        <v-btn
                            class="mt-6"
                            text
                            color="red"
                            @click="show_msj = !show_msj">
                            Cerrar
                        </v-btn>
                        <div class="py-3">
                            {{ msj_error }}
                        </div>
                    </v-sheet>
                </v-bottom-sheet>
            </v-col>
        </v-row>
    </div>
</template>

<script>
export default {
    mounted() {
        
    },
    data:function(){
        return {
            name: null,
            email: null,
            password: null,
            imagen: null,
            errores:[],
            show_msj: false,
            msj_error: null,
            show_password: false,
        }
    },
    methods:{
        registrar:function(){
            var temp_this = this;
            const formData = new FormData();
            formData.append("imagen",this.imagen);
            formData.append("name",this.name);
            formData.append("email",this.email);
            formData.append("password",this.password);

            axios({
                method: 'POST',
                url: 'api/v1/auth/usuario',
                data: formData
            }).then(function (response) {
                if(response.status == 200){
                    localStorage.setItem('authToken',response.data.token);
                    temp_this.$router.push({ path: '/conversaciones' });
                }
            }).catch(function (error) {
                temp_this.msj_error = error.response.data.status_code+' '+error.response.data.message;
                temp_this.show_msj = !temp_this.show_msj;
                temp_this.errores = error.response.data.errors;
            });
        },
        limpiar:function(){
            this.name = null;
            this.email = null;
            this.password = null;
            this.imagen = null;
        }
    }
}
</script>