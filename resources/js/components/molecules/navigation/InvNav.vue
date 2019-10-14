<template>
  <div class="w-full flex flex-wrap">
    <div class="w-full p-2 flex shadow">
      <div class="w-1/2 md:w-1/5">
        <a
          class="hover:bg-red-lightest font-bold rounded nav-link text-xl text-red md:text-2xl md:text-center"
          href="/"
        >
          Inveniet
        </a>
      </div>
      <div
        v-if="auth"
        class="w-1/2 md:hidden"
      >
        <div class="w-full flex justify-end">
          <button
            class="text-red items-center px-3 py-2 outline-none rounded animated bounce"
            @click="open"
          >
            <i class="far fa-2x fa-caret-square-down" />
          </button>
        </div>
      </div>

      <inv-staionary-nav v-if="auth" />

      <div
        v-if="auth"
        class="hidden md:flex md:justify-end md:block md:w-1/5"
      >
        <inv-authenticated :user-name="userName" />
      </div>
      <div
        v-else
        class="w-1/2 self-center md:justify-end md:w-4/5"
      >
        <inv-not-authenticated />
      </div>
    </div>

    <div
      v-if="auth"
      class="w-full flex justify-end flex-wrap md:hidden"
    >
      <inv-mobile-nav :class="navStyle" />
    </div>
  </div>
</template>

<script>
export default {
  props: {
    auth: {
      required: false,
      type: Boolean,
      default: false,
    },
    userName: {
      required: false,
      type: String,
      default: '',
    },
  },
  data() {
    return {
      toggle: true,
    };
  },
  computed: {
    navStyle() {
      return `w-full ${this.toggle ? ' hidden' : 'animated fadeIn'}`;
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
