<template>
  <label
    :for="target"
    :class="`text-${size} font-${weight}`"
    class="text-grey-darkest"
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
    size: {
      required: false,
      type: String,
      default: 'base',
    },
    weight: {
      required: false,
      type: String,
      default: 'normal',
    },
  },
};
</script>

<style scoped>

</style>
