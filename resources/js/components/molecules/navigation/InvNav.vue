<template>
  <nav class="flex items-center  justify-between flex-wrap bg-primary p-2">
    <div class="flex items-center  text-white mr-6">
      <a
        class="hover:bg-primary-dark text-2xl text-center rounded nav-link text-white"
        href="/"
      >{{ title }}</a>
    </div>
    <div class="block lg:hidden">
      <button
        class="flex items-center px-3 py-2 border rounded text-teal-200 border-teal-400 hover:text-white hover:border-white"
        @click="open"
      >
        Test
      </button>
    </div>
    <div :class="navStyle">
      <div class="text-sm lg:flex-grow">
        <a
          href="#responsive-header"
          class="block mt-4 text-white lg:inline-block lg:mt-0 text-teal-200 mr-4"
        >
          Docs
        </a>
        <a
          href="#responsive-header"
          class="block mt-4 text-white lg:inline-block lg:mt-0 text-teal-200 hover:text-white mr-4"
        >
          Examples
        </a>
        <a
          href="#responsive-header"
          class="block mt-4 text-white lg:inline-block lg:mt-0 text-teal-200 hover:text-white"
        >
          Blog
        </a>
      </div>
    </div>
  </nav>
</template>

<script>
export default {

  props: {
    title: {
      required: true,
      type: String,
    },
  },
  data() {
    return {
      toggle: true,
    };
  },

  computed: {
    navStyle() {
      return `w-full flex-grow lg:block lg:flex lg:items-center lg:w-auto ${this.toggle ? ' hidden' : ''}`;
    },
  },

  methods: {
    open() {
      this.toggle = !this.toggle;
    },
  },
};
</script>

<style scoped>

</style>
