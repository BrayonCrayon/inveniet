<template>
  <div class="flex">
    <div class="flex-shrink mr-2">
      <div class="form-group form-check">
        <inv-check-box-input
          id="repeatedCBO"
          v-model="inputValue"
          name="repeated"
          @input="emitInput"
          :disabled=disabled
        />
        <label
          class="form-check-label cursor-pointer"
          for="repeatedCBO"
        >
          Repeat
        </label>
      </div>
    </div>

    <div
      v-if="disableOptions"
      class="w-3/4 md:w-2/4 lg:w-1/4"
    >
      <select
        class="form-control cursor-pointer hover:bg-grey-lightest"
        name="repeatedType"
        :disabled="disabled"
      >
        <option
          v-for="type in types"
          :value="type.id"
          :selected="currentType === type.id"
        >
          {{ type.name }}
        </option>
      </select>
    </div>
  </div>
</template>
<script>
export default {
  props: {
    value: {
      required: false,
      type: Number,
      default: 0,
    },
    disabled: {
      required: false,
      type: Boolean,
      default: false,
    },
    types: {
      required: true,
      type: Array,
    },
    currentType: {
      required: true,
      type: Number,
      default: 0,
    },
  },

  data() {
    return {
      disableOptions: false,
      inputValue: false,
    };
  },

  created() {
    this.inputValue = this.value === 1;
    this.disableOptions = this.value === 1;
  },

  methods: {
    emitInput() {
      this.disableOptions = this.inputValue;
      this.$emit('input', this.inputValue);
    },
  },

};
</script>

<style scoped>
</style>
