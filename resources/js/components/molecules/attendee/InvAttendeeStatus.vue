<template >
	<div class="col row" >
		<div class="col-6 text-grey-darkest align-items-center" >
			<div class="font-bold" >
				{{ attendeeType }} Access
			</div >
		</div >

		<div class="col-6 text-grey-darkest" >
			<div class="font-bold" >
				{{ attendeeStatus }}
			</div >
		</div >
	</div >
</template >
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
