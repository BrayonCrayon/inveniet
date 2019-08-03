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
    @input="emitInput"
  >
</template>

<script>
export default {
  props: {
    value: {
      required: false,
      type: Boolean,
      default: false,
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

  created() {
    this.inputValue = this.value;
    this.show = true;
  },

  methods: {
    emitInput() {
      this.inputValue = !this.inputValue;
      this.$emit('input', this.inputValue);
    },
  },
};
</script>

<style scoped>
</style>
