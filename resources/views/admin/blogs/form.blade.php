<div class="row">
    <div class="col-md-6">
        <x-larastrap::text name="title" label="Title" placeholder="Title"/>
    </div>
    <div class="col-md-6 mb-3">
        <x-larastrap::file name="image" label="Image" placeholder="Image"/>
        @if($blog->image)
            <img src="{{ asset('blog-images/'.$blog->image) }}" alt="Image" class="img-fluid w-25"/>
        @endif
    </div>
    <div class="col-md-12">
        <x-larastrap::date name="date" label="Date" placeholder="date"/>
    </div>
    <div class="col-md-12">
        <x-larastrap::textarea id="textarea" rows="4" name="description" label="Description" placeholder="Description"/>
    </div>
</div>
