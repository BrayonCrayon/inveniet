<tamplate >
	<div class="modal-backdrop">
		<div class="modal">
			<slot name="header">
			</slot>

			<slot name="body">
			</slot>

			<slot name="footer">
			</slot>
		</div>
	</div>

</tamplate >

<script >
    export default {
        mounted() {
            console.log('Basic Modal Component Mounted');
        }
    }
</script >
