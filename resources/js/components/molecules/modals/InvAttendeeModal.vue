<template>
  <div>
    <button
      class="btn bg-green-dark hover:bg-green text-white font-bold text-lg shadow"
      @click="showModal"
    >
      <i class="fas fa-user-plus" />
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
            <input
              v-model="userSearch"
              type="text"
              placeholder="Search For Users"
              class="form-control"
            >
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
<script >

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

    /**
     * Adds selected users to an event that corresponds to the eventId attribute.
     */
    async addSelectedUsers() {
      try {
        const { data } = await window.Axios.post('/attendee/storeMany', {
          eventId: this.eventId,
          userInvites: this.userInvites,
        });

        if (data) this.hideModal();
        location.reload();
      } catch (err) {
        console.error(err);
      }
    },

    /**
     * Retrieves Users that have a name like 'userSearch' and that are not in the event.
     * @returns {Promise<void>}
     */
    async getUsers() {
      try {
        const { data } = await window.Axios.post('/attendee/search', {
          search: this.userSearch,
          eventId: this.eventId,
        });
        this.users = data;
      } catch (err) {
        console.error(err);
      }
    },

    /**
     * Adds a userId to a list of current users the user would like to invite.
     * @param userId
     */
    addUser(userId) {
      if (!this.userAlreadyAdded(userId)) {
        this.userInvites.push(userId);
      }
    },

    /**
     * Removes a user from the current users the user would like to invite.
     * @param userId
     */
    removeUser(userId) {
      this.userInvites = this.userInvites.filter(invitedUserId => invitedUserId !== userId);
    },

    /**
     * Checks to see if a user has already been added to the invite list.
     * @param userId
     * @returns {boolean}
     */
    userAlreadyAdded(userId) {
      const index = this.userInvites.findIndex(invitedUserId => invitedUserId === userId);
      return index !== -1;
    },

    /**
     * Resets all attributes in the modal so that when the modal is hidden
     *  it will not persist any old data.
     */
    resetModal() {
      this.userInvites = [];
      this.userSearch = '';
      this.users = [];
    },

    /**
     * Shows the modal from either hidden state or new.
     */
    showModal() {
      this.resetModal();
      this.$refs['modal-user-invite'].show();
    },

    /**
     * Hides the modal
     */
    hideModal() {
      this.resetModal();
      this.$refs['modal-user-invite'].hide();
    },

  },

};
</script >
