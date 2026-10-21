<div class="row">
    <div class="col-md-4">
        <x-larastrap::text name="title" label="Title" placeholder="Title" />
    </div>
    <div class="col-md-4">
        <x-larastrap::select name="category_id" label="Categories" :options="[null => 'Please-select'] + $categories" />
    </div>
    <div class="col-md-4">
        <x-larastrap::text name="slug" label="Slug" placeholder="Slug" />
    </div>
    <div class="col-md-12">
        <x-larastrap::textarea rows="4" name="description" label="Description" placeholder="Description" />
    </div>
    <div class="col-md-12 mt-4">
        <x-larastrap::file name="pdf" label="Upload PDF" accept="application/pdf" />
        @if (!empty($product->pdf) && file_exists(public_path($product->pdf)))
            <div class="mt-3" id="pdf-preview">
                <label class="form-label">Current PDF Preview:</label>
                <iframe src="{{ asset($product->pdf) }}" width="100%" height="500px"
                    style="border: 1px solid #ccc;"></iframe>
                <a href="{{ route('admin.products.delete-pdf', $product->id) }}" type="submit" class="btn btn-danger">
                    <i class="fa fa-trash"></i> Delete PDF
                </a>

            </div>
        @endif
    </div>

    <h3 class="mt-3">Add Image</h3>
    <hr class="mb-3">
    <div id="image-input-container">
        <div class="col-md-12">
            <div class="button-container d-flex justify-content-end mb-3">
                <button type="button" class="btn btn-primary add-image-button me-2"><i class="fa fa-plus"></i></button>
            </div>
        </div>

        <div class="row">
            @foreach ($product->productImages as $productImage)
                <div class="col-md-3 mb-3 image-input-wrapper">
                    <div class="border">
                        <img src="{{ asset($productImage->image) }}" alt="Image" width="150px" height="150px"
                            style="object-fit: cover" />
                        <button type="button" class="btn btn-danger remove-image-button"
                            data-image-id="{{ $productImage->id }}">
                            <i class="fa fa-trash"></i>
                        </button>
                    </div>
                </div>
            @endforeach
        </div>
    </div>


    <h3 class="mt-5">Meta Tags</h3>
    <hr class="mb-3">
    <div class="col-md-12 mb-4 ">
        <button type="button" class="btn btn-warning float-end" id="add-meta-tag"> <i
                class="fa-solid fa-plus"></i></button>
    </div>
    <div id="meta-tags-container">
        @if (isset($product->metaTags))
            @foreach ($product->metaTags as $item)
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
        // Add new image input field
        $(document).on('click', '.add-image-button', function() {
            var newImageInput = $(`
                <div class="col-md-3 mb-3 image-input-wrapper">
                    <x-larastrap::file name="image[]" label="Image" placeholder="Image"/>
                    <button type="button" class="btn btn-danger remove-image-button"><i class="fa fa-trash"></i></button>
                </div>
            `);

            $('#image-input-container .row:last').append(newImageInput);
        });

        // Remove image input field
        $(document).on('click', '.remove-image-button', function() {
            const imageId = $(this).data('image-id');
            if (imageId) {
                $.ajax({
                    url: '{{ route('admin.products.image-destroy') }}',
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        image_id: imageId
                    },
                    success: function(response) {
                        if (response.success) {
                            $(this).closest('.image-input-wrapper').remove();
                        } else {
                            alert("Failed to delete image.");
                        }
                    }.bind(this),
                    error: function(xhr) {
                        alert("An error occurred while deleting the image.");
                    }
                });
            } else {
                if ($('#image-input-container .image-input-wrapper').length > 1) {
                    $(this).closest('.image-input-wrapper').remove();
                } else {
                    alert("At least one image input is required.");
                }
            }
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
