<template>
  <div>
    <h2>Here is IPR-3 API</h2>

    <div class="card" v-for="el in API_DB">
      <h5 class="card-header">{{el.name}}</h5>
      <div class="card-body" v-for="met in el.methods">
        <h5 class="card-title">{{met.name}}</h5>
        <div class="card-text">
          <p>
            {{met.method}} - {{met.name}}
            <br>
            <mark><code>{{backendUrl}}{{met.url}}</code></mark>
          </p>
        </div>
        <button disabled class="btn btn-primary">Try (in progress)</button>
      </div>
    </div>
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
          name: 'Test Zone: Test API work',
          methods: [
            {
              url: '/api/v1/',
              method: 'GET',
              name: 'Check API is working',
            }
          ],
        }
      ]
    }
  }
}
</script>

<style scoped>

</style>