<!-- Start:Contact -->
<div class="container">
    <div class="row justify-content-center mt-5 mb-5 p-2 contact" id="contact_form">
        <div class="col-lg-4 ml-auto side_contact p-4">
            <h3 class="mb-4">Let's talk about everything.</h3>

            @foreach($socials as $social)
                <p>
                    @if( $social->type == 'phone' )
                    <span>
                        <i class="fa fa-solid fa-phone"></i>
                    </span>
                    @elseif( $social->type == 'email' )
                    <span>
                        <i class="fa fa-solid fa-envelope"></i>
                    </span>
                    @else 
                    <span>
                        <i class="fa fa-solid fa-location-arrow"></i>
                    </span>
                    @endif

                    <span class="px-3">
                        {{ $social->value }}
                    </span>
                </p>

            @endforeach

        </div>
        <div class="col-lg-8 mb-5 mb-lg-0">

            <h2 class="mb-5">Fill the form Now. <br> It's easy.</h2>

            <form class="border-right pr-5 mb-5 ajax-form" action="{{ route('store.contact') }}" method="post" id="contactForm" swalOnSuccess="We Will contact you soon" resetAfterSend>
                <div class="row">
                    <div class="col-md-6 form-group">
                        <input type="text" class="form-control" name="name" id="fname" placeholder="Full Name">
                        <p class="error error_name"></p>
                    </div>
                    <div class="col-md-6 form-group">
                        <input type="text" class="form-control" name="company" id="contact" placeholder="Company Name">
                        <p class="error error_company"></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 form-group">
                        <input type="text" class="form-control" name="phone" id="phone" placeholder="Phone">
                        <p class="error error_phone"></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 form-group">
                        <input type="text" class="form-control" name="email" id="email" placeholder="Email">
                        <p class="error error_email"></p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 form-group">
                        <textarea class="form-control" name="content" id="message" cols="30" rows="10"
                            placeholder="Write your message"></textarea>
                        <p class="error error_content"></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <input type="submit" value="Send Message"
                            class="btn btn-primary rounded-0 py-2 px-4 ms-auto d-block">
                        <span class="submitting"></span>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>
<!-- End:Contact -->