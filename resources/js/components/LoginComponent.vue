<template>
    <div>
        <!-- App.vue -->
        <v-app>
            <!-- Sizes your content based upon application components -->
            <v-main>
                <v-container fluid>
                    <v-row>
                        <v-col-8>
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
                                            label="email"
                                            :rules="rules"
                                            hide-details="auto"
                                            ></v-text-field>
                                        
                                        <v-text-field label="Contraseña"></v-text-field>
                                    </v-card-text>
                                    <v-card-actions>
                                        <v-btn
                                            x-large
                                            color="green"
                                            >
                                            Enviar
                                        </v-btn>
                                    </v-card-actions>

                            </v-card>
                            
                        </v-col-8>
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
        
    }
</script>