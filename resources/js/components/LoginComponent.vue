<template>
    <div>
        <v-row>
            <v-col
                cols="6"
                offset="3">
                <v-card
                    elevation="6">

                    <v-card-title
                        class="">
                        ¡Bienvenido!
                    </v-card-title>

                    <v-card-subtitle>
                        Iniciar Sesión
                    </v-card-subtitle>

                    <v-card-text>
                        <v-text-field
                            name="email"
                            v-model="email"
                            label="email"
                            hide-details="auto"
                            ></v-text-field>

                        <v-text-field
                            name="password"
                            v-model="password"
                            label="Contraseña"
                            :append-icon="show_password ? 'mdi-eye' : 'mdi-eye-off'"
                            :type="show_password ? 'text' : 'password'"
                            class="input-group--focused"
                            @click:append="show_password = !show_password"
                            ></v-text-field>

                        <v-switch
                            v-model="remember_me"
                            label="Recordar sesión"
                            color="orange"
                            inset
                            hide-details
                        ></v-switch>
                    </v-card-text>
                    <v-card-actions>
                        <v-row>
                            <v-col
                                cols="8"
                                offset="2">
                                <v-btn
                                    x-large
                                    color="green"
                                    v-on:click="login"
                                    ml-auto
                                >Enviar
                                </v-btn>
                            </v-col>
                            <v-col
                                cols="12">
                                <v-btn
                                    text
                                    text-center
                                    color="error"
                                >Olvide mi contraseña
                                </v-btn>
                            </v-col>
                            <v-col
                                cols="12">
                                <v-btn
                                    text
                                    text-center
                                    :to="{name:'registro'}"
                                    >Registrarse
                                </v-btn>

                            </v-col>
                        </v-row>
                    </v-card-actions>
                </v-card>
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
            if(localStorage.getItem("authToken") != null){
                this.$router.push("/conversaciones");
            }
        },
        data:function(){
        	return{
        		email: 'jruizt850@gmail.com',
        		password: 'Afrodita22',
                remember_me: false,
                show_password: false,
                show_msj: false,
                msj_error: null,
                /*rules: {
                    required: value => !!value || 'Required.',
                    min: v => v.length >= 8 || 'Min 1 character',
                    emailMatch: () => (`The email and password you entered don't match`),
                },*/
        	}
        },
        methods: {
            login:function(){
                var temp_this = this;
                axios.post('api/v1/auth/login', {
                    email: this.email,
                    password: this.password,
                    remember_me: this.remember_me
                }).then(function (response) {
                    if(response.status == 200 && response.data.token != null){
                        localStorage.setItem('authToken',response.data.token);
                        console.log(response.data);
                        temp_this.$router.push({ path: '/conversaciones' });
                    }else{
                        temp_this.msj_error = response.data.code + response.data.error;
                        temp_this.show_msj = !this.show_msj;
                    }
                }).catch(function (error) {
                    console.log(error);
                    temp_this.msj_error = error;
                    temp_this.show_msj = !temp_this.show_msj;
                });
            },
        }
    }
</script>