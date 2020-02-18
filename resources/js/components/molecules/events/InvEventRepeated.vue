<template>
  <div class="flex flex-col w-full">
    <div class="flex">
      <inv-label>Repeat</inv-label>
      <b-form-checkbox
        id="repeatedCBO"
        v-model="inputValue"
        switch
        name="repeated"
        :disabled="disabled"
        class="mx-2"
        @input="emitInput"
      />
    </div>

    <div
      v-if="disableOptions"
      class="flex w-full md:w-2/4 lg:w-1/4"
    >
      <select
        class="form-control cursor-pointer hover:bg-grey-lightest text-sm md:text-base"
        name="repeated_type_id"
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
