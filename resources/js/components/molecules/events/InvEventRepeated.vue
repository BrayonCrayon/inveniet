<template>
	<div class="form-group form-check">
		<inv-check-box-input
				id="repeatedCBO"
				v-model="value"
				name="repeated"
		/>
		<label
				class="form-check-label cursor-pointer"
				for="repeatedCBO"
		>
			Repeat
		</label>
	</div>

	<div class="col-5">
		{{-- TODO : FIGURE OUT ANOTHER WAY TO GRAB ALL TYPES --}}
		<select class="form-control cursor-pointer hover:bg-grey-lightest"
		        name="repeatedType"
				v-for="type in types">
			<option :value="type.id"
			        v-bind:selected="currentType == type.id">
				{{ type.name }}
			</option>
		</select>
	</div>
</template>
<script>
	export default {
		props : {
			value : {
				required : false,
				type : Number,
				default : 0,
			},
			disableCBO : {
				required : false,
				type : Boolean,
				default : false,
			},
			types : {
				required : true,
				type : Array,
			},
			currentType : {
				required : true,
				type : Number,
				default : 0,
			},
		},
	};
</script>

<style scoped>
</style>
