<template>
    <div>
        <!-- App.vue -->
        <v-app>
            <!-- Sizes your content based upon application components -->
            <v-main>
                <v-container fluid>
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
                    </v-row>
                </v-container>
            </v-main>

            <v-footer app>
                Javier Ruiz Trejo
            </v-footer>
        </v-app>


    </div>
</template>

<script>
    export default {
        mounted() {

        },
        data:function(){
        	return{
        		email: null,
        		password: null,
                remember_me: false,
                show_password: false,
                /*rules: {
                    required: value => !!value || 'Required.',
                    min: v => v.length >= 8 || 'Min 1 character',
                    emailMatch: () => (`The email and password you entered don't match`),
                },*/
        	}
        },
        methods: {
            login:function(){
                axios.post('api/v1/auth/login', {
                    email: this.email,
                    password: this.password,
                    remember_me: this.remember_me
                }).then(function (response) {
                    console.log(response);
                })
                .catch(function (error) {
                    console.log(error);
                });
            }
        }
    }
</script>