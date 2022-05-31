<!-- Our numbers -->
<section class="p-t-200 p-b-200">
    <div class="xs-text-center sm-text-center">
        <div class="row justify-content-center">
            @foreach($staticals as $statical)
            <div class="col-lg-4 col-md-4">
                <div class="text-center d-flex flex-column">
                    <div class="counter text-lg"> <span data-speed="3000" data-refresh-interval="50" data-to="{{ $statical->number }}" data-from="0" data-seperator="true"></span> </div>
                    <div class="seperator seperator-small"></div>
                    <p class="font-bold text-uppercase">{{ $statical->name }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- end: Our numbers -->