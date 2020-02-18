<template>
  <div class="dropdown self-center">
    <a
      id="ADMIN_DROP_DOWN"
      class="nav-link dropdown-toggle text-red-darkest hover:bg-red-lightest rounded"
      href="#"
      data-toggle="dropdown"
      aria-haspopup="true"
      aria-expanded="false"
    >
      {{ userName }} <span class="caret" />
    </a>
    <div
      class="dropdown-menu dropdown-menu-right"
      aria-labelledby="ADMIN_DROP_DOWN"
    >
      <a
        class="dropdown-item cursor-pointer text-red-darkest hover:bg-red-lightest"
        @click="logout"
      >
        Logout
      </a>

      <form
        ref="LOGOUT_FORM"
        action="/logout"
        method="POST"
        hidden
      >
        <input
          type="hidden"
          name="_token"
          :value="csrfToken"
        >
        <input
          type="hidden"
          name="_method"
          value="POST"
        >
      </form>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    userName: {
      required: true,
      type: String,
      default: '',
    },
  },
  data() {
    return {
      csrfToken: '',
    };
  },
  created() {
    this.csrfToken = window.CSRF.csrfToken;
  },
  methods: {
    logout() {
      this.$refs.LOGOUT_FORM.submit();
    },
  },
};
</script>

<style scoped>

</style>
