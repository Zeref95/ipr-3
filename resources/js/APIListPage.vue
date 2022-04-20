<template>
  <div>
    <h2>Here is IPR-3 API</h2>
    <ul>
      <li v-for="el in API_DB">
        {{el.method}} (<mark><code>{{backendUrl}}</code></mark>) - {{el.name}}
      </li>
    </ul>
  </div>
</template>

<script>
export default {
  props: ['backendUrl'],
  name: 'APIListPage',
  data() {
    return {
      API_DB: [
        {
          url: '/api/v1/',
          method: 'GET',
          name: 'Check API'
        }
      ]
    }
  }
}
</script>

<style scoped>

</style>