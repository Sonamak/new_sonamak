<div class="container-fluid">
        <div class="screen_height slider d-flex align-items-center">
            <div class="row main_container">
                <div class="col-lg-6">
                    <div class="slider_text">
                        <h1 class="top-slider__title section-title">
                            {{ $banner->header_text }}
                        </h1>
                        <p class="sub_title">
                            {{ $banner->lower_text }}
                        </p>
                    </div>
                    <div class="d-flex mx-2 let_talk">
                        <button class="btn btn-primary">{{ $banner->btn_text }}</button>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="main_container">
                        <div class="outer_frame position-relative d-flex justify-content-center align-items-center">
                            <div class="outer_spinner  position-absolute">

                            </div>
                            @if($banner->background)
                            <img src="{{ asset('storage/banner/large/'.$banner->background->name) }}"
                                alt="graphic_design" class="w-100" width="497" height="363">
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>