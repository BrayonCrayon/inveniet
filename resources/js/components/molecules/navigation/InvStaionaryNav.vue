<template>
  <div
    class="hidden md:block md:w-3/5 md:flex  "
  >
    <div class="self-center">
      <div class="dropdown">
        <button
          id="EVENT_DD"
          class="btn dropdown-toggle text-red-darkest hover:bg-red-lightest"
          type="button"
          data-toggle="dropdown"
          aria-haspopup="true"
          aria-expanded="false"
        >
          Events
        </button>
        <div
          class="dropdown-menu"
          aria-labelledby="EVENT_DD"
        >
          <a
            class="dropdown-item hover:bg-red-lightest"
            href="/event"
          >Attending</a>
          <a
            class="dropdown-item hover:bg-red-lightest"
            href="/attendee-requests"
          >Invites</a>
          <a
            class="dropdown-item hover:bg-red-lightest"
            href="/event/search"
          >Search</a>
        </div>
      </div>
    </div>

    <div class="self-center">
      <div class="dropdown">
        <button
          id="CONTACT_DD"
          class="btn dropdown-toggle text-red-darkest hover:bg-red-lightest"
          type="button"
          data-toggle="dropdown"
          aria-haspopup="true"
          aria-expanded="false"
        >
          Contacts
        </button>
        <div
          class="dropdown-menu"
          aria-labelledby="CONTACT_DD"
        >
          <a
            class="dropdown-item hover:bg-red-lightest"
            href="/contacts"
          >Relationships</a>
          <a
            class="dropdown-item hover:bg-red-lightest"
            href="/relationship-requests"
          >Requests</a>
          <a
            class="dropdown-item hover:bg-red-lightest"
            href="/contacts/search"
          >Search</a>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
};
</script>

<style scoped>

</style>
