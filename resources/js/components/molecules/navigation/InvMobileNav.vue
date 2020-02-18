<template>
  <div>
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
              class="dropdown-item text-xs text-red-darkest"
            >Attending</a>
            <a
              href="/attendee-requests"
              class="dropdown-item text-xs  text-red-darkest"
            >Invites</a>
            <a
              href="/event/search"
              class="dropdown-item text-xs text-red-darkest"
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
              class="dropdown-item text-xs text-red-darkest"
            >
              Relationships
            </a>
            <a
              href="/relationship-requests"
              class="dropdown-item text-xs text-red-darkest"
            >Requests</a>
            <a
              href="/contacts/search"
              class="dropdown-item text-xs text-red-darkest"
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
</template>

<script>
export default {

  data() {
    return {
      csrfToken: window.CSRF.csrfToken,
    };
  },
  methods: {
    logout() {
      this.$refs.LOGOUT_FORM.submit();
    },
  },
};
</script>

<style scoped>

</style>
