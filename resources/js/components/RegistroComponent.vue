<template>
    <div>
        <h1>Registro</h1>
        <v-app>
            <!-- Sizes your content based upon application components -->
            <v-main>
                <v-container>
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
                            required>
                        </v-text-field>
                        <v-btn
                            v-on:click="registrar"
                            color="green">
                            Registrar
                        </v-btn>
                        <v-btn
                            color="orange">
                            Limpiar
                        </v-btn>
                        <v-btn
                            color="red"
                            :to="{name:'home'}">
                            Cancelar
                        </v-btn>
                    </v-form>
                </v-container>
            </v-main>
        </v-app>        
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
        }
    },
    methods:{
        registrar:function(){
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
                console.log(response);
            }).catch(function (error) {
                console.log(error);
            });
        }
    }
}
</script>