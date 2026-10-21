<div class="row">
    <div class="col-md-6">
        <x-larastrap::text name="title" label="Title" placeholder="Title"/>
    </div>
    <div class="col-md-6 mb-3">
        <x-larastrap::file name="image" label="Image" placeholder="Image"/>
        @if($testimonial->image)
            <img src="{{ asset('testimonial-images/'.$testimonial->image) }}" alt="Image" class="img-fluid w-25"/>
        @endif
    </div>
    <div class="col-md-12">
        <x-larastrap::textarea rows="4" name="description" label="Description" placeholder="Description"/>
    </div>
</div>
