<div class="row">
    <div class="col-md-6">
        <x-larastrap::text name="title" label="Title" placeholder="Title" />
    </div>
    <div class="col-md-6">
        <x-larastrap::text name="slug" label="Slug" placeholder="Slug" />
    </div>
    <div class="col-md-12">
        <x-larastrap::textarea name="description" label="Description" placeholder="Description" />
    </div>

    <hr class="my-5 border border-dark">
    <h3>Meta Tags</h3>
    <div class="col-md-12 mb-4 ">
        <button type="button" class="btn btn-warning float-end" id="add-meta-tag"> <i
                class="fa-solid fa-plus"></i></button>
    </div>
    <div id="meta-tags-container">
        @if (isset($page->metaTags))
            @foreach ($page->metaTags as $item)
                <div class="row" style="align-items: flex-end;">
                    <div class="col-md-11 col-10">
                        <x-larastrap::text name="meta_tag[]" label="Meta Tag" value="{{ $item->meta_tag }}" required />
                    </div>
                    <div class="col-md-1">
                        <button type="button" class="btn btn-danger float-end mb-3 remove-meta-tag">
                            <i class="fa-solid fa-trash"></i>
                        </button>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
</div>

<script type="module">
    $(document).ready(function() {
        function slugify(text) {
            return text.toString().toLowerCase()
                .replace(/\s+/g, '-') // Replace spaces with -
                .replace(/[^\w\-]+/g, '') // Remove all non-word chars
                .replace(/\-\-+/g, '-') // Replace multiple - with single -
                .replace(/^-+/, '') // Trim - from start of text
                .replace(/-+$/, ''); // Trim - from end of text
        }

        $('input[name="title"]').on('input', function() {
            var title = $(this).val();
            var slug = slugify(title);
            $('input[name="slug"]').val(slug);
        });

        // add meta
        let metaTagCount = 1;
        $('#add-meta-tag').click(function() {
            const newMetaTag = `
        <div class="row" style="align-items: flex-end;">
            <div class="col-md-11">
                <x-larastrap::text name="meta_tag[]" label="Meta Tag" required/>
            </div>
            <div class="col-md-1">
                <button type="button" class="btn btn-danger float-end mb-3 remove-meta-tag">
                    <i class="fa-solid fa-trash"></i>
                </button>
            </div>
        </div>
    `;
            $('#meta-tags-container').append(newMetaTag);
            metaTagCount++;
        });

        $('#meta-tags-container').on('click', '.remove-meta-tag', function() {
            $(this).closest('.row').remove();
        });
    });
</script>
