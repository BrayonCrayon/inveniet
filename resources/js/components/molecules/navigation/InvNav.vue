<template>
  <div class="w-2/4 flex justify-end flex-wrap">
    <!--  <div class="w-full bg-primary">-->
    <div class="w-full flex justify-end lg:hidden">
      <button
        class="text-white items-center px-3 py-2 border rounded"
        @click="open"
      >
        Test
      </button>
    </div>
    <div :class="navStyle">
      <!-- Left Side Of Navbar -->
      <ul class="navbar-nav">
        <li class="self-start mb-2">
          <div class="dropdown">
            <button
              id="EVENT_DD_BTN"
              type="button"
              class="btn text-white text-sm dropdown-toggle pb-0 px-0"
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

        <li class="self-start mb-2">
          <div class="dropdown">
            <button
              id="RELATION_SHIP_DD_BTN"
              type="button"
              class="btn text-white text-sm dropdown-toggle pb-0 px-0"
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
    <!--  </div>-->
  </div>
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
