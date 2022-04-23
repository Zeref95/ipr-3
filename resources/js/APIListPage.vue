<template>
  <div>
    <h2>Here is IPR-3 API</h2>

    <div class="card" v-for="el in API_DB">
      <h5 class="card-header">{{ el.name }}</h5>
      <div class="card-body" v-for="met in el.methods">
        <h5 class="card-title">{{ met.name }}</h5>
        <div class="card-text">
          {{ met.method }} - {{ met.name }}
          <br>
          <mark><code>{{ backendUrl }}{{ met.url }}</code></mark>
          <br>
          <div v-if="met.request">
            <p>Request Body</p>
            <pre>{{ met.request }}</pre>
          </div>
          <div v-if="met.response">
            <p>Response</p>
            <pre>{{met.response}}</pre>
          </div>
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
  data () {
    return {
      API_DB: [
        {
          name: 'Auth',
          methods: [
            {
              url: '/api/v1/login',
              method: 'POST',
              name: 'Login',
              request: {
                'email': '{{your_email}}',
                'password': '{{your_password}}',
              },
              response: {
                "token":'{{bearer_token}}'
              }
            },
            {
              url: '/api/v1/',
              method: 'GET',
              name: 'Check API is working',
              response: {
                "message": "Hello {{your_name}}"
              }
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