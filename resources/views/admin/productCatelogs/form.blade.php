<div class="row">
    <div class="col-md-6">
        <x-larastrap::text name="title" label="Title" placeholder="Title" />
    </div>
    <div class="col-md-6 mb-3">
        <x-larastrap::file name="image" label="Image" />
        @if ($productCatelog->image)
            <img src="{{ asset($productCatelog->image) }}" alt="Image" class="img-fluid w-25" />
        @endif
    </div>
    <div class="col-md-6 mb-3">
        <x-larastrap::file name="pdf" label="Pdf" />
        @if ($productCatelog->pdf)
            <iframe src="{{ route('admin.productCatelogs.file', $productCatelog->id) }}" width="100%" height="230px" style="border:none"
                title="{{ $productCatelog->title }}"></iframe>
        @endif
    </div>
</div>

<script type="module">
    function slugify(text) {
        return text.toString().toLowerCase()
            .replace(/\s+/g, '-') // Replace spaces with -
            .replace(/[^\w\-]+/g, '') // Remove all non-word chars
            .replace(/\-\-+/g, '-') // Replace multiple - with single -
            .replace(/^-+/, '') // Trim - from start of text
            .replace(/-+$/, ''); // Trim - from end of text
    }

    $(document).ready(function() {
        $('input[name="title"]').on('input', function() {
            var title = $(this).val();
            var slug = slugify(title);
            $('input[name="slug"]').val(slug);
        });
    });
</script>
