<template>
  <button
    :class="`button ${color}`"
    @click="navigate"
  >
    <slot />
  </button>
</template>

<script>
export default {
  props: {
    link: {
      required: false,
      type: String,
      default: null,
    },
    color: {
      required: false,
      type: String,
      default: 'secondary',
    },
  },
  methods: {
    navigate() {
      if (this.link) window.location = this.link;
    },
  },
};
</script>

<style lang="scss" scoped>
    .button{
      @apply px-3 py-3 rounded font-medium;

      &.secondary {
        @apply text-secondary-darkest bg-secondary;
        &:hover{
          @apply bg-secondary-dark;
        }
      }

      &.green {
        @apply text-green-lightest bg-green-dark;
        &:hover{
          @apply bg-green-light;
        }
      }

      &.grey {
        @apply text-grey-darkest bg-grey-light;
        &:hover{
          @apply bg-grey;
        }
      }

      &.grey-outline {
        @apply text-grey-darkest bg-grey-lightest border border-2 border-grey-dark;
        &:hover{
          @apply bg-grey-lighter;
        }
      }
    }
</style>
