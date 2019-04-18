<template>
  <v-app>
      <v-container>
      <ul class="nav-menu">
        <li v-for="link in linkMenu" :key="link.title">
          <router-link :to="link.url">{{ link.title }}</router-link>
        </li>
      </ul>
      <router-view></router-view>
    </v-container>
  </v-app>
</template>

<script>

export default {
  name: 'App',
  components: {},
  data () {
    return {
      drawer: null,
      linkMenu: [
        {
          title: 'Добавить резюме',
          url: '/'
        },
      ],
    }
  },
}
</script>
<style scoped>
  .nav-menu {
    display: flex;
    align-items: center;
    list-style: none;
  }
  .nav-menu li {
    margin-right: 30px;
  }
  .nav-menu li a {
    color: #000000;
    text-decoration: none;
  }
  .v-list__tile__title a {
    color: inherit;
    text-decoration: none;
  }
</style>