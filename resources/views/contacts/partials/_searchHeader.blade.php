<div class="ml-5 mb-3">
	<div class="flex flex-col">
		<div class="w-full flex">
			<div class="w-1/2 self-center md:text-2xl">
				<i class="fas fa-user-friends pr-2"></i>Relationships
			</div>
		</div>
		<div class="w-full flex flex-row mt-2 rounded-full border-grey-dark border-2">
			<form method="GET" action="{{ route('contacts.search') }}" class="w-full">
				@csrf
				<div class="text-xs flex flex-row md:text-base">
					<button class="btn text-sm align-self-center text-grey md:text-lg hover:text-grey-dark">
						<i class="fas fa-search"></i>
					</button>
					<inv-text-input name="search" place-holder="Search New Contacts" no-border
					                no-padding></inv-text-input>
				</div>
			</form>
			<div class="align-self-center">
				<a href="{{ route('contacts.search') }}"
				   class="btn text-sm text-grey outline-none border-0 border-none hover:text-red md:text-lg">
					<i class="fas fa-ban"></i>
				</a>
			</div>
		</div>
	</div>
</div>
