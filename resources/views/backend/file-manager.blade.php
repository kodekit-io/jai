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
                <div id="container text-center">
                    <a id="browse" class="btn btn-default" href="javascript:;">Select File</a>
                </div>
            </div>
            <div role="tabpanel" class="tab-pane active" id="media">
                <div class="row">
                    <div class="col-md-8">
                        <div class="row image-gallery">
                        </div>
                    </div>
                    <div class="col-md-4 text-center image-preview">
                        <img src="" id="image_preview" alt="">
                        <br>
                        <button class="btn btn-default" id="image_setter">Set image</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{!! asset('assets/global/plugins/plupload/js/plupload.full.min.js') !!}" type="text/javascript"></script>
<script src="{!! asset('assets/global/plugins/jquery.blockui.min.js') !!}" type="text/javascript"></script>
<script>
    jQuery(document).ready(function() {
        loadImagesToList();
    });

    var baseUrl = '{!! url('/') !!}';
    var smallImageUrl = '{!! url('images/small/') !!}' + '/';
    var featuredImageUrl = '{!! url('images/featured/') !!}' + '/';

    function loadImagesToList() {
        $.ajax({
            method: "POST",
            url: "{!! backendUrl('get-images') !!}",
            data: {
                _token: '{!! csrf_token() !!}'
            },
            beforeSend: function(xhr) {
                App.blockUI({
                    target: '.image-gallery',
                    animate: true
                });
            }
        })
        .done(function( result ) {
            var images = jQuery.parseJSON(result);
            var image_container = $('.image-gallery');
            image_container.html('');
            for (var i = 0; i < images.length; i++) {
                var fileName = images[i].file_name;
                var imagePath = smallImageUrl + fileName;
                var mediaId = images[i].id;
                var image = '<div class="col-xs-4 col-md-2">' +
                        '<a href="#" class="thumbnail">' +
                        '<img image-id="1" src="' + imagePath +'" media-filename="'+ fileName +'" media-id="'+ mediaId +'" alt="" onclick="thumbClicked(this)">' +
                        '</a></div>';
                image_container.append(image);
            }
        });
    }

    function thumbClicked(source) {
//        var imageSrc = $(source).attr('src');
        var mediaId = $(source).attr('media-id');
        var fileName = $(source).attr('media-filename');
        var preview = $('#image_preview');
        preview.attr('src', featuredImageUrl + fileName);
        preview.attr('media-id', mediaId);
    }

    jQuery('#image_setter').click(function(x) {
        var source = $('#image_preview').attr('src');
        var mediaId = $('#image_preview').attr('media-id');
        $('#featured_image_id').val(mediaId);
        $('#featured_image').attr('src', source);
        $('#remove-featured').show();
        $('#ajax-modal').modal('hide');
    });

    jQuery('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
        var target = $(e.target).attr("href") // activated tab
        if (target == '#media') {
            loadImagesToList();
        }
    });

</script>


<script type="text/javascript">
    var uploader = new plupload.Uploader({
        browse_button : document.getElementById('browse'), // you can pass in id...
        //container: document.getElementById('tab_images_uploader_container'), // ... or DOM Element itself
        url: '{!! backendUrl('upload-image-handler') !!}',
        headers: {
            'X-CSRF-TOKEN': '{!! csrf_token() !!}'
        },
        init: {
            PostInit: function() {
//                $('#image_preview').html("");
            },

            FilesAdded: function(up, files) {
                up.start();
                App.blockUI({
                    target: '.image-preview',
                    animate: true
                });
                $('.nav-tabs a[href="#media"]').tab('show');
            },

            UploadProgress: function(up, file) {
                $('#uploaded_file_' + file.id + ' > .status').html(file.percent + '%');
            },

            FileUploaded: function(up, file, response) {
                $('.image-preview').unblock();
                var response = $.parseJSON(response.response);
                var preview = $('#image_preview');
                // console.log(response);
                if (response.result.status && response.result.status == 'OK') {
                    var id = response.id;
                    preview.attr('src', smallImageUrl + response.result.filename);
                    preview.attr('media-id', response.result.mediaId);
                    preview.attr('media-filename', response.result.filename);
                    loadImagesToList();
                } else {
                    // set failed upload
                    // $('#uploaded_file_' + file.id + ' > .status').removeClass("label-info").addClass("label-danger").html('<i class="fa fa-warning"></i> Failed');
                    // App.alert({type: 'danger', message: 'One of uploads failed. Please retry.', closeInSeconds: 10, icon: 'warning'});
                }
            },

            Error: function(up, err) {
                App.alert({type: 'danger', message: err.message, closeInSeconds: 10, icon: 'warning'});
            }
        }
    });

    uploader.init();
</script>


{{--function previewFile() {--}}
{{--var file    = document.querySelector('input[type=file]').files[0];--}}
{{--var reader  = new FileReader();--}}

{{--reader.addEventListener("load", function () {--}}
{{--$.ajax({--}}
{{--method: "POST",--}}
{{--url: "{!! backendUrl('upload-image') !!}",--}}
{{--data: {--}}
{{--_token: '{!! csrf_token() !!}',--}}
{{--image_src: reader.result,--}}
{{--image_name: file.name--}}
{{--}--}}
{{--})--}}
{{--.done(function( image ) {--}}
{{--var imageData = jQuery.parseJSON(image);--}}
{{--$('.nav-tabs a[href="#media"]').tab('show');--}}
{{--var preview = $('#image_preview');--}}
{{--preview.attr('src', reader.result);--}}
{{--preview.attr('height', '150px');--}}
{{--preview.attr('media-id', imageData.id);--}}
{{--});--}}
{{--}, false);--}}

{{--if (file) {--}}
{{--reader.readAsDataURL(file);--}}
{{--}--}}
{{--}--}}