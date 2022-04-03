<template>
  <div class="messages scroll" ref="messages">
    <scale-loader :loading="loading"> </scale-loader>
    <message v-for="message in messages" :key="message.id" :message="message">
    </message>
  </div>
</template>

<script>
import ScaleLoader from "vue-spinner/src/ScaleLoader";

export default {
  created() {
    this.loadMessages();
  },

  data() {
    return {
      loading: false,
    };
  },

  computed: {
    messages() {
      //return this.$store.state.chat.messages;
      return this.$store.getters.messages;
    },
  },

  methods: {
    loadMessages() {
      this.loading = true;
      this.$store.dispatch("loadMessages").finally(() => {
        this.loading = false;
        this.scrollMessages();
      });
    },
    scrollMessages() {
      setTimeout(() => {
        this.$refs.messages.scroll({
          top: this.$refs.messages.scrollHeight,
          let: 0,
          behavior: "smooth",
        });
      }, 100);
    },
  },

  watch: {
    messages() {
      this.scrollMessages();
    },
  },

  components: {
    ScaleLoader,
  },
};
</script>
<style scope>
.messages {
  height: 600px;
  max-height: 600px;
  overflow-x: hidden;
  overflow: auto;
}

</style>
