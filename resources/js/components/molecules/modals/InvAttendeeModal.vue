<template>
  <div>
    <button
      class="btn bg-yellow-lightest hover:bg-yellow-lighter border-2 border-red-darkest text-red-darkest text-sm font-bold md:text-lg shadow"
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
      <div class="flex flex-col w-full">
        <div>
          <input
            v-model="userSearch"
            type="text"
            placeholder="Search For Users"
            class="form-control text-sm my-2 md:text-lg"
          >
        </div>
        <div>
          <div
            v-if="users.length > 0"
            class="list-group-scrollable"
          >
            <div
              v-for="user in users"
              :key="user.id"
              class="list-group-item flex flex-wrap w-full"
            >
              <div class="w-full align-self-center text-warm-grey-0 font-semibold text-sm">
                {{ user.name }}
              </div>

              <div class="flex-grow">
                <select
                  :id="'ATTENDEE_OPT_' + user.id"
                  :ref="'ATTENDEE_OPT_' + user.id"
                  class="form-control text-sm md:text-lg"
                  :disabled="userAlreadyAdded( user.id )"
                >
                  <option
                    v-for="opt in attendeeTypeOptions"
                    :key="opt"
                    :value="opt"
                  >
                    {{ opt }}
                  </option>
                </select>
              </div>

              <div
                class=" "
              >
                <button
                  v-if="userAlreadyAdded( user.id )"
                  class="btn bg-yellow-lighter hover:bg-yellow-light text-red-darkest font-semibold text-sm shadow mx-2 md:text-lg"
                  @click="removeUser( user.id )"
                >
                  Remove
                </button>
                <button
                  v-else
                  class="btn border-2 border-red-darkest bg-yellow-lightest hover:bg-yellow-lighter text-red-darkest font-semibold text-sm shadow mx-2 md:text-lg"
                  @click="addUser( user.id )"
                >
                  Add
                </button>
              </div>
            </div>
          </div>
          <div
            v-else
            class="list-group-scrollable  border flex flex-col font-semibold justify-center text-center text-xs md:text-lg"
          >
            No Users with a starting name of '{{ userSearch }}'
          </div>
        </div>
      </div>

      <div class="w-full flex justify-between md:justify-center">
        <div class="md:flex md:w-1/2 px-2">
          <button
            class="btn bg-warm-grey-700 hover:bg-warm-grey-500 text-warm-grey-0 font-semibold text-sm shadow w-full md:text-lg"
            block
            @click="hideModal"
          >
            Cancel
          </button>
        </div>
        <div class="md:flex md:w-1/2 px-2">
          <button
            class="btn bg-yellow-dark hover:bg-yellow text-white font-semibold text-sm shadow w-full md:text-lg"
            block
            @click="addSelectedUsers"
          >
            Add Selected
          </button>
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
    isHost: {
      required: false,
      type: Boolean,
      default: false,
    },
  },

  data() {
    return {
      users: [],
      userSearch: '',
      userInvites: [],
      modalVisible: false,
      attendeeTypeOptions: ['Guest'],
    };
  },

  watch: {
    userSearch(newVal, oldVal) {
      if (!newVal) return;
      this.getUsers();
    },
  },

  mounted() {
    if (this.isHost === true) this.attendeeTypeOptions.push('Host');
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
        this.userInvites.push(
          {
            id: userId,
            attendeeType: this.$refs[`ATTENDEE_OPT_${userId}`][0].value,
          },
        );
      }
    },

    /**
			 * Removes a user from the current users the user would like to invite.
			 * @param userId
			 */
    removeUser(userId) {
      this.userInvites = this.userInvites.filter(invitedUser => invitedUser.id !== userId);
    },

    /**
			 * Checks to see if a user has already been added to the invite list.
			 * @param userId
			 * @returns {boolean}
			 */
    userAlreadyAdded(userId) {
      const index = this.userInvites.findIndex(invitedUser => invitedUser.id === userId);
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
</script>
