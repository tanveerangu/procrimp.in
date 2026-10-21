<div class="row">
    <div class="col-md-6">
        <x-larastrap::text name="title" label="Title" placeholder="Title"/>
    </div>
    <div class="col-md-6 mb-3">
        <x-larastrap::file name="icon" label="Icon" placeholder="Icon"/>
        @if($socialLink->icon)
            <img src="{{ asset('socialLink-images/'.$socialLink->icon) }}" alt="Icon" class="img-fluid w-25"/>
        @endif
    </div>
    <div class="col-md-6">
        <x-larastrap::text name="url" label="Url" placeholder="Url"/>
    </div>
</div>
