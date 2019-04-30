@forelse($events as $event)
	<div class="border-t ml-5" ></div >
	<div class="flex  w-full " >
		<div class="timeline-ball md:mt-5 mt-8" ></div >
		<div class="py-5 pl-5 w-full" >
			<div class="flex justify-between  mb-3 items-baseline" >

				<div class="flex flex-col items-baseline" >
					<h4 class="md:font-bold font-semibold text-grey-darker" >{{ $event->name }}</h4 >
					<div class="text-grey-dark" >
						{{ $event->starts_at_diff }}
					</div >
				</div >
				<div class="contents-baseline text-grey-darkest ml-2 flex" >
					<a href="{{ route('event.edit', ['id' => $event->id]) }}"
					   class="btn hover:bg-green-lightest text-grey-darkest text-lg" >
						Edit
					</a >
					<form action="{{ route('event.destroy', ['id' => $event->id]) }}"
					      method="POST" >
						@csrf
						@method('DELETE')
						<button class="btn hover:bg-red-lightest text-red-darkest text-lg" >
							<i class="fas fa-dumpster-fire" ></i > Delete
						</button >
					</form >
				</div >
			</div >

			<p >{{ $event->description }}</p >

			<div class="flex my-2" >
				<inv-button link="{{ route('event.show', ['id' => $event->id]) }}"
				            color="grey" >
					<i class="fas fa-search-location" ></i > Check it out
				</inv-button >
				{{--TODO: INTERGRATE THIS EVENT INTO GOOGLE CALENDAR--}}
				{{--				<inv-button color="grey" class="mx-2">--}}
				{{--					<i class="far fa-calendar-plus"></i> Add to Calendar--}}
				{{--				</inv-button>--}}


			</div >
		</div >
	</div >
@empty
	No Events to Show.
@endforelse
