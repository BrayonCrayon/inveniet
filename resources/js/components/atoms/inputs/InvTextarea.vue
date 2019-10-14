<template>
  <div>
    <textarea
      v-if="show"
      :id="name"
      v-model="inputValue"
      type="time"
      class="form-control text-sm md:text-md"
      :name="name"
      cols="30"
      rows="4"
      required
      :disabled="disabled"
      @input="emitInput"
    />
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
    errorText: {
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
