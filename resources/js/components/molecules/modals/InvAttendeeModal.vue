<template>
  <div>
    <b-button
      class="btn bg-green-dark hover:bg-green text-white font-bold text-lg shadow"
      @click="showModal"
    >
      Invite a User
    </b-button>

    <b-modal
      ref="modal-user-invite"
      hide-footer
      title="Select a User"
      scrollable
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
            <div v-else class="text-nowrap">
              No Users with a starting name of '{{ userSearch }}'
            </div>
          </div>
        </div>
      </div>

      <div class="col-12">
        <div class="row">
          <div class="col">
            <b-button
              class="btn bg-red-dark hover:bg-red text-white font-bold text-lg shadow"
              block
              @click="hideModal"
            >
              Cancel
            </b-button>
          </div>
          <div class="col">
            <form method="GET" action="/events/index">
              <b-button
                class="btn bg-green-dark hover:bg-green text-white font-bold text-lg shadow"
                block
              >
                Add Selected
              </b-button>
            </form>
          </div>
        </div>
      </div>
    </b-modal>
  </div>
</template>
<script >
import axios from 'axios';

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
    };
  },

  watch: {
    userSearch() {
      this.getUsers();
    },
  },

  methods: {
    getUsers() {
      axios.post('/user/search', {
        search: this.userSearch,
      })
        .then((response) => {
          this.users = response.data.usersToInvite;
        })
        .catch((error) => {
          console.log(error);
        });
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

    showModal() {
      this.userInvites = [];
      this.userSearch = '';
      this.users = [];
      this.$refs['modal-user-invite'].show();
    },

    hideModal() {
      this.userInvites = [];
      this.userSearch = '';
      this.users = [];
      this.$refs['modal-user-invite'].hide();
    },

  },

};
</script >
