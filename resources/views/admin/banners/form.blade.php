<div class="row">
    <div class="col-md-6">
        <x-larastrap::text name="title" label="Title" placeholder="Title"/>
    </div>
    <div class="col-md-6">
        <x-larastrap::text name="small_title" label="Small Title" placeholder="Small Title"/>
    </div>
    <div class="col-md-6">
        <x-larastrap::textarea rows="4" name="description" label="Description" placeholder="Description"/>
    </div>
    <div class="col-md-6">
        <x-larastrap::text name="url" label="Url" placeholder="Url"/>
    </div>
    <div class="col-md-12 mb-3">
        <x-larastrap::file name="image" label="Image" placeholder="Image"/>
        @if($banner->image)
            <img src="{{ asset('banner-images/'.$banner->image) }}" alt="Image" class="img-fluid w-25"/>
        @endif
    </div>
</div>
