<div class="col-12">
    <div class="row">
        <div class="col-6">
            <h3 class="card-title ">My Relationships</h3>
        </div>
        <div class="col-6">
            <div class="row">
                <div class="col-2 align-self-center">
                    <a href="{{ route('contacts.index') }}"
                       class="contents-baseline text-grey-darkest">
                        Clear
                    </a>
                </div>
                <div class="col">
                    <form method="GET" action="/contacts/search">
                        @csrf
                        <inv-text-input name="search" place-holder="Search For Users"/>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
