<template>
  <div class="flex flex-wrap">
    <div class="w-1/4 text-grey-darkest align-items-center">
      <div class="text-xs md:text-base font-bold">
        {{ attendeeType }}
      </div>
    </div>

    <div class="w-3/4 flex justify-end text-grey-darkest">
      <div class="text-xs md:text-base  font-bold">
        {{ attendeeStatus }}
      </div>
    </div>
  </div>
</template>
<script >
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
</script >
