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
                            <div class="col-xs-6 col-md-3">
                                <a href="#" class="thumbnail">
                                    <img width="200" image-id="1" src="{!! asset('uploads/nina-1.jpg') !!}" alt="" class="img-thumbnail">
                                </a>
                            </div>
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

    function previewFile() {
        var file    = document.querySelector('input[type=file]').files[0];
        var reader  = new FileReader();

        reader.addEventListener("load", function () {
            $.ajax({
                method: "POST",
                url: "{!! url('upload-image') !!}",
                data: {
                    _token: '{!! csrf_token() !!}',
                    image_src: reader.result
                }
            })
            .done(function( msg ) {
                $('.nav-tabs a[href="#media"]').tab('show');
                var preview = $('#image_preview');
                preview.attr('src', reader.result);
                preview.attr('height', '150px');
            });
        }, false);

        if (file) {
            reader.readAsDataURL(file);
        }
    }

    jQuery('#image_setter').click(function(x) {
        var source = $('#image_preview').attr('src');
        console.log(source);
        $('#featured_image').attr('src', source);
        $('#featured_image').attr('width', '200px');
    });

    jQuery('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
        var target = $(e.target).attr("href") // activated tab
        if (target == '#media') {
            $.ajax({
                method: "GET",
                url: "{!! url('get-images') !!}",
                data: {
                    _token: '{!! csrf_token() !!}'
                }
            })
            .done(function( result ) {
                var images = jQuery.parseJSON(result);
                var image_container = $('.image-gallery');
                image_container.html('');
                for (var i = 0; i < images.images.length; i++) {
                    // console.log(images.images[i]);
                    var image = '<div class="col-xs-6 col-md-3">' +
                            '<a href="#" class="thumbnail">' +
                            '<img width="200" image-id="1" src="' + images.images[i] +'" alt="" class="img-thumbnail" onclick="thumbClicked(this)">' +
                            '</a></div>';
                    image_container.append(image);
                }
            });
        }
    });

    function thumbClicked(source) {
        var imageSrc = $(source).attr('src');
        var preview = $('#image_preview');
        preview.attr('src', imageSrc);
        preview.attr('height', '150px');
        var i = new Image();
        i.src = preview.attr('src');
    }

    jQuery('.img-thumbnail').on('click', function() {
        var imageSrc = $(this).attr('src');
        var preview = $('#image_preview');
        preview.attr('src', imageSrc);
        preview.attr('height', '150px');
        var i = new Image();
        i.src = preview.attr('src');
    });
</script>