<template>
  <div class="chat-message">
    <div class="chat-info">
      <b>{{ message.user.name }}</b>
      <span>{{ message.created_at }}</span>
    </div>
    <div class="chat-img" v-if="message.user.image">
      <img :src="`/storage/app/public/users/${message.user.image}`" :alt="message.user.name" />
    </div>
    <div class="chat-img" v-else>
      <img src="/imgs/no-image.png" :alt="message.user.name" />
    </div>
    <div :class="['message',{'owner': message.owner}]">
      {{ message.body }}
    </div>
  </div>
</template>
<script>
export default {
  props: ["message"],
};
</script>
<style scope>
.chat-message {
  float: left;
  width: 100%;
  margin: 10px 0;
}
.chat-info {
  float: left;
  width: 100%;
  margin: 10px 0;
}
.chat-info span {
  float: right;
}
.chat-img {
  float: left;
}
.chat-img img {
  max-width: 60px;
  border-radius: 100%;
  border: 1px solid #fff;
}
.message {
  background: #fff;
  padding: 6px;
  border-radius: 4px;
  color: black;
  position: relative;
  margin: 58px 9px 0 72px;
}
.message.owner {
  background: #dcf8c6;
}
.message:before {
  position: absolute;
  right: 100%;
  top: 15px;
  border: solid transparent;
  border-right-color: #fff;
  content: "";
  height: 0;
  width: 0;
  pointer-events: none;
  border-width: 6px;
  margin-top: -8px;
}
.message.owner:before {
  position: absolute;
  right: 100%;
  top: 15px;
  border: solid transparent;
  border-right-color: #dcf8c6;
  content: "";
  height: 0;
  width: 0;
  pointer-events: none;
  border-width: 6px;
  margin-top: -8px;
}
</style>
