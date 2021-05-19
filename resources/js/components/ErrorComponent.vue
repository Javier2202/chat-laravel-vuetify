<template>
    <div>
        <v-row>
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
        props: {
			msj_error: String,
			show_msj: Boolean
		},
    }
</script>
