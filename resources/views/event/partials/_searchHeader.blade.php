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

		<div class="w-full flex flex-row mt-2 rounded-full border-grey-darkest border-2">
			<form method="GET" action="{{ route('event.search') }}" class="w-full">
				@csrf
				<div class="text-xs flex flex-row md:text-base">
					<button class="btn text-sm align-self-center text-grey-darkest md:text-lg hover:text-grey-dark">
						<i class="fas fa-search"></i>
					</button>
					<inv-text-input name="search" placeholder="Search Events" no-border no-padding></inv-text-input>
				</div>
			</form>
			<div class="align-self-center">
				<a href="{{ route('event.search') }}"
				   class="btn text-sm text-black outline-none border-0 border-none hover:text-red md:text-lg">
					<i class="fas fa-ban"></i>
				</a>
			</div>
		</div>


	</div>
</div>
