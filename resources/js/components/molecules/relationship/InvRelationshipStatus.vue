<template>
  <div class="flex flex-col py-3">
    <div class="text-warm-grey-200 text-sm md:text-base">
      <div class="font-semibold">
        {{ relationshipType }}
      </div>
    </div>

    <div class="text-warm-grey-200 flex text-sm md:text-base">
        Status:
      <div class="font-semibold px-2">
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
