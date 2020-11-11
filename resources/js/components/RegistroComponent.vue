<template>
    <div>
        <h1>Registro</h1>
        <v-app>
            <!-- Sizes your content based upon application components -->
            <v-main>
                <v-container>
                    <v-form>
                        <v-file-input
                            accept="image/png, image/jpeg, image/jpg,"
                            show-size
                            placeholder="Imagen"
                            prepend-icon="mdi-camera"
                            label="Perfil"
                        ></v-file-input>
                        <v-text-field
                            label="Nombre completo"
                            required>
                        </v-text-field>
                        <v-text-field
                            label="Correo electronico"
                            required>
                        </v-text-field>
                        <v-btn
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
}
</script>