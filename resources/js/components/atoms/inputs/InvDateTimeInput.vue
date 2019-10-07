<template>
  <div class="flex">
    <div class="w-full flex flex-row md:flex-col">
      <div class="w-full">
        <datetime
          v-model="inputValue"
          input-class="text-sm md:text-base form-control cursor-pointer hover:bg-red-lightest hover:shadow-md"
          type="datetime"
          :hidden-name="name"
          use12-hour
          @input="emitInput"
          required
        />
      </div>
      <i class="far fa-hand-point-up self-center p-2 md:hidden"></i>
    </div>
    <div
      class="alert p-0 text-red-dark text-sm"
      :class="{ hidden : errorText === ''}"
    >
      {{ errorText }}
    </div>
  </div>
</template>

<script>
import { Datetime } from 'vue-datetime';

export default {
  components: {
    Datetime,
  },
  props: {
    value: {
      required: false,
      type: String,
      default: '',
    },
    errorText: {
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
      inputValue: this.value,
    };
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
