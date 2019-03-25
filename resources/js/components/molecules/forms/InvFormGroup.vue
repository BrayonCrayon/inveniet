<template>
  <div
    v-if="show"
    class="mb-4"
  >
    <inv-label>{{ label }}</inv-label>
    <inv-text-input
      v-model="inputValue"
      :name="name"
      :disabled="isDisabled"
      @input="emitInput"
    />
  </div>
</template>

<script>
export default {
  props: {
    label: {
      required: true,
      type: String,
    },
    isDisabled: {
      required: false,
      type: Boolean,
      default: false,
    },
    name: {
      required: false,
      type: String,
      default: '',
    },
    value: {
      required: false,
      type: String,
      default: '',
    },
  },
  data() {
    return {
      show: false,
      inputValue: '',
    };
  },
  mounted() {
    this.inputValue = this.value;
    this.show = true;
  },
  methods: {
    emitInput() {
      console.log('formGroup emitInput');
      this.$emit('input', this.inputValue);
    },
  },
};
</script>

<style scoped>

</style>
