<template>
  <div>
    <h3>{{ users.length }} online</h3>

    <div class="users scroll">
        <div class="user" v-for="user in 10" :key="user">
            <div class="user-img">
                <img src="/imgs/no-image.png" alt="">
            </div>
            <strong>Nome Usuário</strong>
        </div>
    </div>
  </div>
</template>

<script>
export default {
  computed: {
    users() {
      return [];
    },
  },
};
</script>
<style scope>
.users{
    float: left;
    width: 100%;
    overflow-x: hidden;
    overflow-y: auto;
    height: 600px;
    max-height: 600px;
}
.user{
    float: left;
    width: 100%;
    margin: 2px;
}
.user-img {
    float: left;
}
.user-img img {
    max-width: 40px;
    border: 1px solid #FFF;
    border-radius: 100%;
}
.user strong {
    float: left;
    margin: 8px 8px;
}
</style>
