<template>
  <input
    v-if="show"
    :id="name"
    v-model="value"
    type="text"
    class="form-control"
    :name="name"
    :placeholder="placeHolder"
    @input="emitInput"
  >
</template>

<script>
export default {
  props: {
    value: {
      required: false,
      type: String,
      default: '',
    },
    name: {
      required: false,
      type: String,
      default: '',
    },
    placeHolder: {
      required: false,
      type: String,
      default: '',
    },
  },
  data() {
    return {
      show: false,
    };
  },
  mounted() {
    this.show = true;
  },
};
</script>

<style lang="scss" scoped>
input:disabled{
  @apply shadow-inner cursor-not-allowed;
}
</style>
