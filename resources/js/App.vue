<template>
  <a-p-i-list-page :backend-url="backendUrl"></a-p-i-list-page>
</template>

<script>
import APIListPage from './APIListPage'
export default {
  name: 'App',
  components: {APIListPage},

  props: ['backendUrl'],
  mounted () {
    console.log(this.backendUrl);
  },
  data() {
    return {
      API_DB: [
        {
          url: ''
        }
      ]
    }
  }
}
</script>

<style scoped>

</style>