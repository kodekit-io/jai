<div class="row" style="min-height: 500px">
    <div class="col-md-12">
        <h3>Featured Image</h3>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" ><a href="#upload" aria-controls="home" role="tab" data-toggle="tab">Upload Files</a></li>
            <li role="presentation" class="active"><a href="#media" aria-controls="profile" role="tab" data-toggle="tab">Media</a></li>
        </ul>
    </div>
    <div class="col-md-12">
        <!-- Tab panes -->
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane" id="upload">
                <input type="file" onchange="previewFile()">
            </div>
            <div role="tabpanel" class="tab-pane active" id="media">
                <div class="row">
                    <div class="col-md-8">
                        <div class="row image-gallery">

                        </div>
                    </div>
                    <div class="col-md-4 text-center">
                        <img src="" id="image_preview" alt="">
                        <br>
                        <button class="btn btn-default" id="image_setter">Set image</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    jQuery(document).ready(function() {
        loadImagesToList();
    });

    var baseUrl = '{!! url('/') !!}';

    function previewFile() {
        var file    = document.querySelector('input[type=file]').files[0];
        var reader  = new FileReader();

        reader.addEventListener("load", function () {
            $.ajax({
                method: "POST",
                url: "{!! backendUrl('upload-image') !!}",
                data: {
                    _token: '{!! csrf_token() !!}',
                    image_src: reader.result,
                    image_name: file.name
                }
            })
            .done(function( image ) {
                var imageData = jQuery.parseJSON(image);
                $('.nav-tabs a[href="#media"]').tab('show');
                var preview = $('#image_preview');
                preview.attr('src', reader.result);
                preview.attr('height', '150px');
                preview.attr('media-id', imageData.id);
            });
        }, false);

        if (file) {
            reader.readAsDataURL(file);
        }
    }

    jQuery('#image_setter').click(function(x) {
        var source = $('#image_preview').attr('src');
        var mediaId = $('#image_preview').attr('media-id');
        $('#featured_image_id').val(mediaId);
        $('#featured_image').attr('src', source);
        $('#featured_image').attr('width', '200px');
        $('#ajax-modal').modal('hide');
    });

    jQuery('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
        var target = $(e.target).attr("href") // activated tab
        if (target == '#media') {
            loadImagesToList();
        }
    });

    function loadImagesToList() {
        $.ajax({
            method: "POST",
            url: "{!! backendUrl('get-images') !!}",
            data: {
                _token: '{!! csrf_token() !!}'
            }
        })
        .done(function( result ) {
            var images = jQuery.parseJSON(result);
            var image_container = $('.image-gallery');
            image_container.html('');
            for (var i = 0; i < images.length; i++) {
                var imagePath = images[i].media_sizes[0].path;
                var mediaId = images[i].id;
                var image = '<div class="col-xs-6 col-md-3">' +
                        '<a href="#" class="thumbnail">' +
                        '<img width="200" image-id="1" src="' + baseUrl + '/' + imagePath +'" media-id="'+ mediaId +'" alt="" class="img-thumbnail" onclick="thumbClicked(this)">' +
                        '</a></div>';
                image_container.append(image);
            }
        });
    }

    function thumbClicked(source) {
        var imageSrc = $(source).attr('src');
        var mediaId = $(source).attr('media-id');
        var preview = $('#image_preview');
        preview.attr('src', imageSrc);
        preview.attr('height', '150px');
        preview.attr('media-id', mediaId);
    }
</script>