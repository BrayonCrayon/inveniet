<div class="ml-5 mb-3">
	<div class="flex flex-col">
		<div class="w-full flex">
			<div class="w-1/2 self-center md:text-2xl">
				<i class="fas fa-calendar-day pr-2"></i>Events
			</div>
			<div class="w-1/2 flex justify-end text-xs md:text-base">
				<inv-button link="{{ route('event.create') }}" color="grey-outline p-2 m-0">
					<i class="fas fa-plus p-1"></i>
					<div class="md:inline-block hidden">Create Event</div>
				</inv-button>
			</div>
		</div>

		<div class="w-full flex mt-2">
				<div class="w-1/4 justify-start align-self-center">
					<a href="{{ route('event.search') }}"
					   class="btn p-0 text-sm hover:bg-green-lightest text-grey-darkest md:text-lg">
						Clear
					</a>
				</div>
				<div class="w-3/4 text-xs md:text-base">
					<form method="GET" action="/event/search">
						@csrf
						<inv-text-input name="search" placeholder="Search Events"></inv-text-input>
					</form>
				</div>
		</div>


	</div>
</div>
