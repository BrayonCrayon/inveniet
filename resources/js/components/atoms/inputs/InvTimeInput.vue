<template>
  <input
    v-if="show"
    :id="name"
    v-model="inputValue"
    type="time"
    class="form-control cursor-pointer"
    :name="name"
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
  },
  data() {
    return {
      show: false,
      inputValue: '',
    };
  },
  mounted() {
    console.log(this.value);
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

<style lang="scss" scoped>
    input:disabled{
        @apply shadow-inner cursor-not-allowed;
    }
</style>
