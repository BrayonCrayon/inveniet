<template>
  <div class="row">
    <div class="col-6 text-grey-darkest">
      <div class="font-bold">
        Attendee Type:
      </div>
      {{ attendeeType }}
    </div>

    <div class="col-6 text-grey-darkest">
      <div class="font-bold">
        Attendee Status:
      </div>
      {{ attendeeStatus }}
    </div>
  </div>
</template>
<script>
export default {
  props: {
    attendeeStatus: {
      required: true,
      type: String,
    },
    attendeeType: {
      required: true,
      type: String,
    },
  },
};
</script>
