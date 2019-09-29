<template>
  <div class="w-full flex flex-wrap">
    <div class="w-full p-2 flex shadow">
      <div class="w-1/2 md:w-1/5">
        <a
          class="hover:bg-primary-dark rounded nav-link text-xl text-white md:text-2xl md:text-center"
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
            class="text-white items-center px-3 py-2 outline-none rounded animated bounce"
            @click="open"
          >
            <i class="far fa-2x fa-caret-square-down"></i>
          </button>
        </div>
      </div>

      <div v-if="auth" class="hidden md:block md:w-3/5 md:flex  ">
        <div class="self-center">

          <div class="dropdown">
            <button class="btn dropdown-toggle text-white" type="button" id="EVENT_DD" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Events
            </button>
            <div class="dropdown-menu" aria-labelledby="EVENT_DD">
              <a class="dropdown-item hover:bg-red-lightest" href="/event">Hosting</a>
              <a class="dropdown-item hover:bg-red-lightest" href="/attendee-requests">Invites</a>
              <a class="dropdown-item hover:bg-red-lightest" href="/event/search">Search</a>
            </div>
          </div>
        </div>

        <div class="self-center">
          <div class="dropdown">
            <button class="btn dropdown-toggle text-white" type="button" id="CONTACT_DD" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Contacts
            </button>
            <div class="dropdown-menu" aria-labelledby="CONTACT_DD">
              <a class="dropdown-item hover:bg-red-lightest" href="/contacts">Relationships</a>
              <a class="dropdown-item hover:bg-red-lightest" href="/relationship-requests">Requests</a>
              <a class="dropdown-item hover:bg-red-lightest" href="/contacts/search">Search</a>
            </div>
          </div>
        </div>
      </div>

      <div
        v-if="auth"
        class="hidden md:flex md:justify-end md:block md:w-1/5"
      >
        <inv-authenticated :user-name="userName" />
      </div>
      <div v-else
           class="w-1/2 self-center md:justify-end md:w-4/5">
        <inv-not-authenticated />
      </div>
    </div>


    <div
      v-if="auth"
      class="w-full flex justify-end flex-wrap md:hidden"
    >

      <div :class="navStyle">
        <!-- Left Side Of Navbar -->
        <ul class="navbar-nav bg-white">
          <li class="nav-item ">
            <div class="dropdown">
              <button
                id="EVENT_MOBILE_DD"
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
                aria-labelledby="EVENT_MOBILE_DD"
              >
                <a
                        href="/event"
                        class="dropdown-item text-xs"
                >Hosting</a>
                <a
                  href="/attendee-requests"
                  class="dropdown-item text-xs"
                >Invites</a>
                <a
                  href="/events/search"
                  class="dropdown-item text-xs"
                >
                  Search
                </a>
              </div>
            </div>
          </li>

          <li class="nav-item">
            <div class="dropdown">
              <button
                id="CONTACT_MOBILE_DD"
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
                aria-labelledby="CONTACT_MOBILE_DD"
              >
                <a
                  href="/contacts"
                  class="dropdown-item text-xs"
                >
                  Relationships
                </a>
                <a
                  href="/relationship-requests"
                  class="dropdown-item text-xs"
                >Requests</a>
                <a
                  href="/contacts/search"
                  class="dropdown-item text-xs"
                >Search</a>
              </div>
            </div>
          </li>

          <li class="nav-item self-center md:hidden">
            <a
              class="nav-link text-red-darkest outline-none shadow-none font-bold text-center pr-3 cursor-pointer"
              @click="logout"
            >Logout</a>
            <form
              ref="LOGOUT_FORM"
              action="/logout"
              method="POST"
              hidden
            >
              <input
                type="hidden"
                name="_token"
                :value="csrfToken"
              >
              <input
                type="hidden"
                name="_method"
                value="POST"
              >
            </form>
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
    userName: {
      required: false,
      type: String,
      default: '',
    },
  },
  data() {
    return {
      toggle: true,
      csrfToken: '',
    };
  },
  computed: {
    navStyle() {
      return `w-full ${this.toggle ? ' hidden' : 'animated fadeInDown'}`;
    },
  },

  created() {
    this.csrfToken = window.CSRF.csrfToken;
  },

  methods: {
    open() {
      this.toggle = !this.toggle;
    },

    logout() {
      this.$refs.LOGOUT_FORM.submit();
    },
  },
};
</script>

<style scoped>

</style>
