<template>
  <input
    v-if="show"
    :id="name"
    v-model="inputValue"
    type="checkbox"
    :name="name"
    class="form-check-input cursor-pointer"
    :placeHodler="placeHolder"
    :disabled="disabled"
  >
</template>

<script>
export default {
  props: {
    value: {
      required: false,
      type: Number,
      default: 0,
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
    disabled: {
      required: false,
      type: Boolean,
      default: false,
    },
  },
  data() {
    return {
      show: false,
      inputValue: false,
    };
  },
  mounted() {
    this.inputValue = this.value;
    this.show = true;
  },
  methods: {
    emitInput() {
      this.$emit('input', this.inputValue);
    },
  },
};
</script>

<style scoped>
</style>
