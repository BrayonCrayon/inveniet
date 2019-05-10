<div class="col-12">
    <div class="row">
        <div class="col-6">
            <h3 class="card-title ">Relationships</h3>
        </div>
        <div class="col-6">
            <div class="row">
                <div class="col-2 align-self-center">
                    <a href="{{ route('contacts.search') }}"
                       class="btn hover:bg-green-lightest text-grey-darkest text-lg">
                        Clear
                    </a>
                </div>
                <div class="col">
                    <form method="GET" action="/contacts/search">
                        @csrf
                        <inv-text-input name="search" place-holder="Search For New Contact"></inv-text-input>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
