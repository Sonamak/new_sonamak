<div class="modal fade" id="inquiry" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <div class="row">
            <div class="col-md-6 d-flex">
                <img src="{{ asset('storage/system/large/minion_travel.svg') }}" alt="layout" class="w-100">
            </div>
            <div class="col-md-6 p-3">
                <h2 class="modal_text">
                   {{__('main.send_your_inquires_to_us')}}
                </h2>
                <form class="ajax-form">
                   
                </form> 
                <form class="ajax-form" action="{{ route('inquiry') }}" method="post" resetAfterSend callback="hideInquiry">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="name" class="d-block">{{__('main.enter_your_name')}}</label>
                                <input type="text" class="form-control" id="name" placeholder="Ex: John Adam" name="name">
                                <p class="error error_name"></p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email" class="d-block">{{__('main.enter_your_email')}}</label>
                                <input type="text" class="form-control" id="email" name="email" placeholder="Ex: JohnAdam@gmail.com">
                                <p class="error error_email"></p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="telephone" class="d-block">{{__('main.enter_your_telephone')}}</label>
                                <input type="text" class="form-control" name="telephone" id="telephone" placeholder="Ex: 0123456789">
                                <p class="error error_telephone"></p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="department" class="d-block">{{__('main.enter_department_date')}}</label>
                                <input type="datetime-local" class="form-control" id="department" name="department" placeholder="Ex: 0123456789">
                                <p class="error error_department"></p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="return" class="d-block">{{__('main.enter_return_date')}}</label>
                                <input type="datetime-local" class="form-control" id="return" name="return" placeholder="Ex: 0123456789">
                                <p class="error error_return"></p>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="language" class="d-block">{{__('main.enter_tour_language')}}</label>
                                <div class="row ml-2">
                                    <p class="col-md-6">
                                        <input type="radio" id="test1"  class="form-check-input" name="language" selected>
                                        <label for="test1">English</label>
                                    </p>
                                    <p class="col-md-6">
                                        <input type="radio" id="test1"  class="form-check-input" name="language">
                                        <label for="test1">French</label>
                                    </p>
                                    <p class="error error_language"></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="email" class="d-block">{{__('main.enter_your_nationality')}}</label>
                                @include('components.models.country')
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label>{{__('main.enter_your_inquery')}}</label>
                            <textarea class="form-control" rows="5" name="inquiry"></textarea>
                            <p class="error error_inquiry"></p>
                        </div>
                    </div>
                    <button class="btn btn-primary">
                        {{ __('main.submit') }}
                    </button>
                </form> 
            </div>
        </div>
      </div>
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div> -->
    </div>
  </div>
</div>

<script>
    function hide() {
        $('#inquiry').modal('hide')
    }
</script>