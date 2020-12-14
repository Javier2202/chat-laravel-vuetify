<template>
    <div>
        <v-app>
            <v-main>
                <v-container fluid>
                    <router-view/>
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
    }
</script>