<template>
  <div>
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
    <div
      class="alert p-0 text-red-dark text-sm"
      :class="{ hidden : errorText === ''}"
    >
      {{ errorText }}
    </div>
  </div>
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
    errorText: {
      required: false,
      type: String,
      default: '',
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
