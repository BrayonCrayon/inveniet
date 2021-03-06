<div class="ml-5 mb-3">
	<div class="flex justify-between">
		<div class=" self-center text-warm-grey-0 text-xl md:text-2xl" ><i class="fas fa-calendar-day pr-2"></i>My Events</div>
		<div class="text-xs md:text-base">
			<inv-button link="{{ route('event.create') }}" color="rounded outline-none bg-yellow-dark text-white hover:bg-yellow focus:shadow-outline  p-2 m-0">
				<i class="fas fa-plus p-1"></i>
				<div class="md:inline-block hidden">
					Create Event
				</div>
			</inv-button>
		</div>

	</div>
</div>
