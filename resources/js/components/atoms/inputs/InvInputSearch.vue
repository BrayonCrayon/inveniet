<template>
  <div class="w-full flex flex-row mt-2 rounded-full border-warm-grey-500 border-2">
    <div class="text-xs w-full flex md:text-base">
      <button class="btn text-sm align-self-center text-warm-grey-500 md:text-lg hover:text-warm-grey-100">
        <i class="fas fa-search" />
      </button>
      <inv-text-input
        :value="value"
        name="search"
        placeholder="Search Events"
        class="w-full"
        no-border
        no-padding
        not-required
      />
    </div>
    <div class="align-self-center">
      <a
        :href="urlPath"
        class="btn text-sm text-warm-grey-500 outline-none border-0 border-none hover:text-red md:text-lg"
      >
        <i class="fas fa-ban" />
      </a>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    urlPath: {
      required: true,
      type: String,
    },
    value: {
      required: false,
      type: String,
      default: '',
    },
  },

};
</script>

<style scoped>

</style>
