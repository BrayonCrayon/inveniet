<template>
  <div
    v-if="show"
    class="mb-4"
  >
    <inv-label>{{ label }}</inv-label>
    <inv-text-input
      v-if="type === 'text'"
      v-model="inputValue"
      :name="name"
      :disabled="isDisabled"
      :error-text="errorText"
      @input="emitInput"
    ></inv-text-input>
    <inv-date-input
      v-if="type === 'date'"
      v-model="inputValue"
      :name="name"
      :disabled="isDisabled"
      :error-text="errorText"
      @input="emitInput"
    ></inv-date-input>
    <inv-time-input
      v-if="type === 'time'"
      v-model="inputValue"
      :name="name"
      :disabled="isDisabled"
      :error-text="errorText"
      @input="emitInput"
    ></inv-time-input>
    <inv-textarea
      v-if="type === 'textarea'"
      v-model="inputValue"
      :name="name"
      :disabled="isDisabled"
      :error-text="errorText"
      @input="emitInput"
    ></inv-textarea>
    <inv-check-box-input
      v-if="type === 'checkbox'"
      v-model="inputValue"
      :name="name"
      :disabled="isDisabled"
      :error-text="errorText"
      @input="emitInput"
    ></inv-check-box-input>

    <inv-date-time-input
      v-if="type === 'dateTime'"
      v-model="inputValue"
      :error-text="errorText"
      :name="name"
      @input="emitInput"
    ></inv-date-time-input>
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
    type: {
      required: false,
      type: String,
      default: 'text',
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
