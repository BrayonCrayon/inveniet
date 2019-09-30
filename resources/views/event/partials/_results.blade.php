@forelse($events as $event)
	<div class="border-t ml-5" ></div >
	<div class="flex  w-full" >
		<div class="timeline-ball  md:mt-5 mt-8" ></div >
		<div class="py-3 pl-5 w-full flex-col" >
			<div class="flex justify-between  mb-3 items-baseline" >

				<div class="flex flex-col items-baseline" >
					<h4 class="text-sm md:text-base md:font-bold lg:text-lg font-semibold text-grey-darker" >{{ $event->name }}</h4 >
					<div class="text-sm md:text-base text-grey-dark" >
						{{ $event->starts_at_diff }}
					</div >
				</div >
				@if(auth()->user()->isEventHost($event->id))
					<div class="contents-baseline text-grey-darkest ml-2 flex" >
						<a href="{{ route('event.edit', ['id' => $event->id]) }}"
						   class="btn text-md hover:bg-green-lightest text-grey-darkest md:text-lg" >
							Edit
						</a >
					</div >
				@endif
			</div >

			<div class="hidden w-full md:inline-block">
				<p class=" w-5/6 truncate">{{ $event->description }}</p >
			</div>


			@if(!auth()->user()->isEventHost($event->id))
				<div class="flex my-2 text-xs md:text-base" >
					<inv-button link="{{ route('event.show', ['id' => $event->id]) }}"
					            color="grey" >
						<i class="fas fa-search-location" ></i > Check it out
					</inv-button >
					{{--TODO: INTERGRATE THIS EVENT INTO GOOGLE CALENDAR--}}
					{{--				<inv-button color="grey" class="mx-2">--}}
					{{--					<i class="far fa-calendar-plus"></i> Add to Calendar--}}
					{{--				</inv-button>--}}


				</div >
			@endif
		</div >
	</div >
@empty
	No Events to Show.
@endforelse
