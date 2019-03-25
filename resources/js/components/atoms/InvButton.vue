<template>
  <button
    class="btn text-secondary-darkest bg-secondary font-bold hover:bg-secondary-dark"
    @click="navigate"
  >
    <slot />
  </button>
</template>

<script>
export default {
  props: {
    link: {
      required: false,
      type: String,
      default: null,
    },
  },
  methods: {
    navigate() {
      if (this.link) window.location = this.link;
    },
  },
};
</script>

<style scoped>

</style>
