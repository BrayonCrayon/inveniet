<template>
  <div class="w-full flex flex-wrap">
    <div class="w-full p-2 flex shadow">
      <div class="w-1/2">
        <a
          class="hover:bg-primary-dark rounded nav-link text-white md:text-2xl"
          href="/"
        >
          Inveniet
        </a>
      </div>
      <div class="w-1/2">
        <div class="w-full flex justify-end lg:hidden">
          <button
            class="text-white items-center px-3 py-2 border rounded"
            @click="open"
          >
            Test
          </button>
        </div>
      </div>
    </div>
    <div
      v-if="auth"
      class="w-full flex justify-end flex-wrap"
    >
      <!--  <div class="w-full bg-primary">-->

      <div :class="navStyle">
        <!-- Left Side Of Navbar -->
        <ul class="navbar-nav bg-white">
          <li class="nav-item ">
            <div class="dropdown">
              <button
                id="EVENT_DD_BTN"
                type="button"
                class="btn text-red-darkest font-bold dropdown-toggle pb-0 px-0 w-full outline-none shadow-none"
                data-toggle="dropdown"
                aria-haspopup="true"
                aria-expanded="false"
              >
                Events
              </button>
              <div
                class="dropdown-menu text-center py-1 min-w-0"
                aria-labelledby="EVENT_DD_BTN"
              >
                <a
                  href="/events/search"
                  class="dropdown-item text-xs"
                >
                  Search
                </a>
                <a
                  href="/contacts/search"
                  class="dropdown-item text-xs"
                >Requests</a>
              </div>
            </div>
          </li>

          <li class="">
            <div class="dropdown">
              <button
                id="RELATION_SHIP_DD_BTN"
                type="button"
                class="btn text-red-darkest font-bold dropdown-toggle pb-0 px-0 w-full outline-none shadow-none"
                data-toggle="dropdown"
                aria-haspopup="true"
                aria-expanded="false"
              >
                Contacts
              </button>
              <div
                class="dropdown-menu text-center py-1 min-w-0"
                aria-labelledby="RELATION_SHIP_DD_BTN"
              >
                <a
                  href="/contacts/search"
                  class="dropdown-item text-xs"
                >
                  Relationships
                </a>
                <a
                  href="/contacts/search"
                  class="dropdown-item text-xs"
                >Search</a>
                <a
                  href="/contacts/search"
                  class="dropdown-item text-xs"
                >Requests</a>
              </div>
            </div>
          </li>
        </ul>
      </div>
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
  },
  data() {
    return {
      toggle: true,
    };
  },

  computed: {
    navStyle() {
      return `w-full lg:block lg:flex lg:items-center lg:w-auto ${this.toggle ? ' hidden' : ''}`;
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
