<form wire:submit.prevent="saveTour">
    <div class="card-body card-full">

    <div class="form-group">
            <div class="row mb-4">
                <div class="col-sm-12 col-md-4 mg-t-10 mg-sm-t-0">
                    <input type="file" class="dropify" data-default-file="" data-height="200"  />
                </div>
                <div class="mx-2 col-md-6">
                    <label for="Tumbnail">Tumbnail</label>
                    <p class="mt-2 sub-text">
                        Enter Beautiful thumbnail to the tour and please add image in aspect ratio to get the best performance
                    </p>
                </div>
            </div>
        </div>
        
        <div class="form-group">
            <label for="title">
                Title
            </label>
            <input class="form-control" type="text" placeholder="Title English" id="title" wire:model="title_en">
            @error('title_en') <span class="error">{{ $message }}</span> @enderror
            <input class="form-control mt-2" type="text" placeholder="Title French" id="title" wire:model="title_fr">
            @error('title_fr') <span class="error">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label for="title">
                Description English
            </label>
            <textarea class="summernote" wire:model="description_en">Hello</textarea>
            <p class="error error_description_en"></p>
        </div>

        <div class="form-group">
            <label for="title">
                Description French
            </label>
            <textarea class="summernote" wire:model="description_fr">Hello</textarea>
            <p class="error error_description_fr"></p>
        </div>

    </div>
    <div class="card-footer">
        <button class="btn btn-primary">
            Submit
        </button>
    </div>
</form>

@push('component_script')
<script src="{{ asset('admin/js/summernote.js') }}"></script>
<script>
    $('.summernote').summernote({
        height: 200,
        callbacks: {
            onChange: function(contents, $editable) {
                @this.set('.summernote', contents);
            }
        }
    });
</script>
@endpush