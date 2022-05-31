<!-- Start:Footer -->
<footer id="footer" class="">
    <div class="container py-3">
        <div class="row">
            <div class="col-md-4 mt-2">
                <div class="logo mb-4">
                    <img src="https://marketsonamak.sonamak.tech/storage/system/625df863d05fc.svg" alt="logo" width="165" height="52">
                </div>
                @foreach($contacts as $contact)
                    <p>
                        @if( $contact->type == 'phone' )
                        <span>
                            <i class="fa fa-solid fa-phone"></i>
                        </span>
                        @elseif( $contact->type == 'email' )
                        <span>
                            <i class="fa fa-solid fa-envelope"></i>
                        </span>
                        @else 
                        <span>
                            <i class="fa fa-solid fa-location-arrow"></i>
                        </span>
                        @endif

                        <span class="px-3">
                            {{ $contact->value }}
                        </span>
                    </p>
                @endforeach
            </div>
            <div class="col-md-4 d-flex align-items-center flex-column mt-2">
               <div class="navigator mx-auto mt-5">
               <h3 class="footer-title">Footer Navigator</h3>
                <ul class="nav flex-column p-0">
                    <li>
                        <a href="">
                            Home
                        </a>
                    </li>
                    <li>
                        <a href="">
                            Our Portfolio
                        </a>
                    </li>
                    <li>
                        <a href="">
                            About Us
                        </a>
                    </li>
                    <li>
                        <a href="">
                            Contact Us
                        </a>
                    </li>
                </ul>
               </div>
            </div>
            <div class="col-md-4 d-flex justify-content-end mt-2">
                @if($clush)
                    <img src="{{ asset('storage/badget/small/'.$clush->thumbnail->name) }}" alt="clush" class="clush">
                @endif
            </div>
        </div>
    </div>
    <div class="copyright-content">
        <div class="container">
            <div class="copyright-text text-center"> 2019 - Developed by <a href="https://www.sonamak.tech" target="_blank" rel="noopener"> Sonamak</a> </div>
        </div>
    </div>
</footer>
<!-- End:Footer -->