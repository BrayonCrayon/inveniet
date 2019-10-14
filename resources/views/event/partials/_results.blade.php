@forelse($events as $event)
	<div class="border-t-2 border-warm-grey-800 ml-5" ></div >
	<div class="flex  w-full" >
		<div class="timeline-ball md:mt-5 mt-8" ></div >
		<div class="py-3 pl-5 w-full flex-col" >
			<div class="flex justify-between mb-3" >

				<div class="flex flex-col" >
					<h4 class="text-sm md:text-base md:font-bold lg:text-lg font-semibold text-warm-grey-200" >{{ $event->name }}</h4 >
					<div class="text-sm md:text-base text-warm-grey-200" >
						{{ $event->starts_at_diff }}
					</div >
				</div >
                <div>
                    @if(auth()->user()->isEventHost($event->id))
                            <inv-button link="{{ route('event.edit', ['id' => $event->id])}}" color="bg-yellow-lightest leading-none text-red-darkest border-2 border-red-darkest hover:bg-yellow-lighter font-semibold text-sm p-2 m-0" >
                                <i class="far fa-edit p-1"></i>
                                <div class="md:inline-block hidden">
                                    Edit
                                </div>
                            </inv-button>
                    @endif
                </div>
			</div >

			<div class="hidden md:flex md:w-5/6 text-warm-grey-200 md:block">
				{{ $event->description }}
			</div>


			@if(!auth()->user()->isEventHost($event->id))
				<div class="flex my-2 text-xs md:text-base" >
					<inv-button link="{{ route('event.show', ['id' => $event->id]) }}"
					            color="bg-yellow-lighter text-red-darkest shadow hover:bg-yellow-light font-semibold" >
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
