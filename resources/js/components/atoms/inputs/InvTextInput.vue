<template>
  <div>
    <input
      v-if="show"
      :id="name"
      v-model="inputValue"
      type="text"
      class="text-sm md:text-base form-control bg-white"
      :class="{'border-none focus:outline-none border-0' : noBorder,
               'p-0' : noPadding
      }"
      :name="name"
      :placeholder="placeHolder"
      :required="!notRequired"
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
    errorText: {
      required: false,
      type: String,
      default: '',
    },
    notRequired: {
    	required: false,
      type: Boolean,
      default: true,
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
