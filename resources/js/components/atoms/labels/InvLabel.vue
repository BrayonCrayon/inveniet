<template>
  <label
    :for="target"
    class="font-normal text-sm md:text-base lg:text-lg text-grey-darkest mb-0"
  >
    <slot />
  </label>
</template>

<script>
export default {
  props: {
    target: {
      required: false,
      type: String,
      default: null,
    },
  },
};
</script>

<style scoped>

</style>
