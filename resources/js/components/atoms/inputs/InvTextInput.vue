<template>
  <input
    v-if="show"
    :id="name"
    v-model="inputValue"
    type="text"
    class="text-sm md:text-base form-control"
    :class="{'border-none outline-none border-0' : noBorder,
      'p-0' : noPadding
    }"
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
    noBorder: {
      required: false,
      type: Boolean,
      default: false,
    },
    noPadding: {
      required: false,
      type: Boolean,
      default: false,
    },
  },
  data() {
    return {
      show: false,
      inputValue: '',
    };
  },
  mounted() {
    this.show = true;
    this.inputValue = this.value;
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
