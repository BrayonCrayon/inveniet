<template>
  <div>
    <input
      v-if="show"
      :id="name"
      v-model="inputValue"
      type="date"
      class="form-control cursor-pointer"
      :name="name"
      :placeHodler="placeHolder"
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
    errorText: {
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
      this.$emit('input', this.inputValue);
    },
  },
};
</script>

<style lang="scss" scoped>
	input:disabled {
		@apply shadow-inner cursor-not-allowed;
	}
</style>
