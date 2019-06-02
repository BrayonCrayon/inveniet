<template>
  <div class="col row">
    <div class="col-6 text-grey-darkest">
      <div class="font-bold">
        {{ relationshipType }} Relation
      </div>
    </div>

    <div class="col-6 text-grey-darkest">
      <div class="font-bold">
        <i :class="typeIcon" />
        {{ relationshipStatus }}
      </div>
    </div>
  </div>
</template>
<script >
export default {
  props: {
    relationshipStatus: {
      required: true,
      type: String,
    },
    relationshipType: {
      required: true,
      type: String,
    },
  },

  data() {
    return {
      typeIcon: 'fa fa-user-minus',
    };
  },

  mounted() {
    this.determineRelationshipIcon();
  },

  methods: {
    determineRelationshipIcon() {
      this.setStatusIconType('accepted', 'fa fa-user-check');
      this.setStatusIconType('declined', 'fa fa-user-times');
    },

    setStatusIconType(status, iconCssClass) {
      if (status === this.relationshipStatus) {
        this.typeIcon = iconCssClass;
      }
    },
  },

};
</script >
