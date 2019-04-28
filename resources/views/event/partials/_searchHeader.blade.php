<div class="ml-5 mb-3">
	<div class="flex justify-between">
		<h2>Events</h2>

		<div class="col-6">
			<div class="row">
				<div class="col-2 align-self-center">
					<a href="{{ route('event.search') }}"
					   class="btn hover:bg-green-lightest text-grey-darkest text-lg">
						Clear
					</a>
				</div>
				<div class="col">
					<form method="GET" action="/event/search">
						@csrf
						<inv-text-input name="search" placeholder="Search For New Events"/>
					</form>
				</div>
			</div>
		</div>

		<inv-button link="{{ route('event.create') }}" color="grey-outline">
			<i class="fas fa-plus"></i>
			<span class="md:inline-block hidden">Create Event</span>
		</inv-button>

	</div>
</div>
