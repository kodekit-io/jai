<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <title>Title</title>

    {{--<link rel="stylesheet" href="style.css"/>--}}
    <style></style>
</head>

<body>
    <textarea></textarea>

    {{--<script src="script.js"></script>--}}
    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
    <script>
        tinymce.PluginManager.add('example', function(editor, url) {
            // Add a button that opens a window
            editor.addButton('example', {
                text: 'Add Media',
                icon: false,
                onclick: function() {
                    // Open window
                    editor.windowManager.open({
//                        title: 'Example plugin',
//                        body: [
//                            {type: 'textbox', name: 'title', label: 'Title'}
//                        ],
                        url: '{!! url('tiny-image-manager') !!}',
                        width: 1080,
                        height: 600,
                        onsubmit: function(e) {
                            // Insert content when the window form is submitted
                            editor.insertContent('Title: ' + e.data.title);
                        }
                    });
                }
            });

            // Adds a menu item to the tools menu
//            editor.addMenuItem('example', {
//                text: 'Example plugin',
//                context: 'tools',
//                onclick: function() {
//                    // Open window with a specific url
//                    editor.windowManager.open({
//                        title: 'TinyMCE site',
//                        url: 'http://www.tinymce.com',
//                        width: 800,
//                        height: 600,
//                        buttons: [{
//                            text: 'Close',
//                            onclick: 'close'
//                        }]
//                    });
//                }
//            });
        });
    </script>
    <script>
        tinymce.init({
            selector:'textarea',
            plugins: [ 'advlist autolink lists link image charmap print preview hr anchor pagebreak',
            'searchreplace wordcount visualblocks visualchars code fullscreen',
            'insertdatetime media nonbreaking save table contextmenu directionality',
            'emoticons template paste textcolor colorpicker textpattern imagetools example' ],
            toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | example',
            toolbar2: 'print preview media | forecolor backcolor emoticons',
            image_advtab: true,
            menubar: false
        });
    </script>
</body>
</html>