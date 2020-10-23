<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
      <v-alert
  border="left"
  color="green"
  type="success"
>Alert de preuba</v-alert>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
