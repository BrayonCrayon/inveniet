<template>
  <div>
    <button
      class="btn bg-green-dark hover:bg-green text-white font-bold text-lg shadow"
      @click="showModal"
    >
      Invite a User
    </button>

    <b-modal
      ref="modal-user-invite"
      hide-footer
      size="xl"
      title="Select a User"
    >
      <div class="col-12">
        <div class="row">
          <div class="col">
            <inv-text-input
              v-model="userSearch"
              name="search"
              place-holder="Search For Users"
            />
          </div>
        </div>
        <div class="row">
          <div class="col">
            <div
              v-if="users.length > 0"
              class="list-group-scrollable"
            >
              <div
                v-for="user in users"
                :key="user.id"
                class="list-group-item"
              >
                <div class="col-12">
                  <div class="row">
                    <div class="col align-self-center">
                      <div>{{ user.name }}</div>
                    </div>
                    <div
                      v-if="userAlreadyAdded( user.id )"
                      class="col-4 "
                    >
                      <button
                        class="btn bg-red-dark hover:bg-red text-white font-bold text-lg shadow"
                        @click="removeUser( user.id )"
                      >
                        Remove
                      </button>
                    </div>
                    <div
                      v-else
                      class="col-4"
                    >
                      <button
                        class="btn bg-green-dark hover:bg-green text-white font-bold text-lg shadow"
                        @click="addUser( user.id )"
                      >
                        Add
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div
              v-else
              class="list-group-scrollable text-nowrap border flex flex-col justify-center text-center"
            >
              No Users with a starting name of '{{ userSearch }}'
            </div>
          </div>
        </div>
      </div>

      <div class="col-12">
        <div class="row">
          <div class="col">
            <button
              class="btn bg-red-dark hover:bg-red text-white font-bold text-lg shadow w-full"
              block
              @click="hideModal"
            >
              Cancel
            </button>
          </div>
          <div class="col">
            <button
              class="btn bg-green-dark hover:bg-green text-white font-bold text-lg shadow w-full"
              block
              @click="addSelectedUsers"
            >
              Add Selected
            </button>
          </div>
        </div>
      </div>
    </b-modal>
  </div>
</template>
<script>

export default {
  props: {
    eventId: {
      required: true,
      type: Number,
    },
  },

  data() {
    return {
      users: [],
      userSearch: '',
      userInvites: [],
      modalVisible: false,
    };
  },

  watch: {
    userSearch(newVal, oldVal) {
      if (!newVal) return;
      this.getUsers();
    },
  },

  methods: {
    async addSelectedUsers() {
      try {
        const { data } = await window.axios.post('/attendees');
        /* ToDo: Add attendees to the event */
      } catch (err) {
        console.error(err);
      }
    },
    async getUsers() {
      try {
        const { data } = await window.axios.post('/attendee/search', {
          search: this.userSearch,
          eventId: this.eventId,
        });
        this.users = data;
      } catch (err) {
        console.error(err);
      }
    },

    addUser(userId) {
      if (!this.userAlreadyAdded(userId)) {
        this.userInvites.push(
          {
            id: userId,
          },
        );
      }
    },

    removeUser(userId) {
      this.userInvites = this.userInvites.filter(user => user.id !== userId);
    },

    userAlreadyAdded(userId) {
      const index = this.userInvites.findIndex(user => user.id === userId);
      return index !== -1;
    },

    resetModal() {
      this.userInvites = [];
      this.userSearch = '';
      this.users = [];
    },

    showModal() {
      this.modalVisible = true;
      this.resetModal();
      this.$refs['modal-user-invite'].show();
    },

    hideModal() {
      this.modalVisible = false;
      this.resetModal();
      this.$refs['modal-user-invite'].hide();
    },

  },

};
</script>
