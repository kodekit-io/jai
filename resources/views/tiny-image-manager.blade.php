<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Raleway', sans-serif;
            font-weight: 100;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
    </style>
</head>
<body>
<div class="full-height">

    <div class="content">
        <div>
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active" ><a href="#uplaod" aria-controls="home" role="tab" data-toggle="tab">Upload Files</a></li>
                <li role="presentation"><a href="#media" aria-controls="profile" role="tab" data-toggle="tab">Media</a></li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="uplaod">
                    <input type="file">
                </div>
                <div role="tabpanel" class="tab-pane" id="media">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-xs-6 col-md-3">
                                    <a href="#" class="thumbnail">
                                        <img width="200" src="{!! asset('uploads/nina-1.jpg') !!}" alt="" class="img-thumbnail">
                                    </a>
                                </div>
                                <div class="col-xs-6 col-md-3">
                                    <a href="#" class="thumbnail">
                                        <img width="200" src="{!! asset('uploads/nina-1.jpg') !!}" alt="" class="img-thumbnail">
                                    </a>
                                </div>
                                <div class="col-xs-6 col-md-3">
                                    <a href="#" class="thumbnail">
                                        <img width="200" src="{!! asset('uploads/nina-1.jpg') !!}" alt="" class="img-thumbnail">
                                    </a>
                                </div><div class="col-xs-6 col-md-3">
                                    <a href="#" class="thumbnail">
                                        <img width="200" src="{!! asset('uploads/nina-1.jpg') !!}" alt="" class="img-thumbnail">
                                    </a>
                                </div><div class="col-xs-6 col-md-3">
                                    <a href="#" class="thumbnail">
                                        <img width="200" src="{!! asset('uploads/nina-1.jpg') !!}" alt="" class="img-thumbnail">
                                    </a>
                                </div><div class="col-xs-6 col-md-3">
                                    <a href="#" class="thumbnail">
                                        <img width="200" src="{!! asset('uploads/nina-1.jpg') !!}" alt="" class="img-thumbnail">
                                    </a>
                                </div><div class="col-xs-6 col-md-3">
                                    <a href="#" class="thumbnail">
                                        <img width="200" src="{!! asset('uploads/nina-1.jpg') !!}" alt="" class="img-thumbnail">
                                    </a>
                                </div><div class="col-xs-6 col-md-3">
                                    <a href="#" class="thumbnail">
                                        <img width="200" src="{!! asset('uploads/nina-1.jpg') !!}" alt="" class="img-thumbnail">
                                    </a>
                                </div>
                                <div class="col-xs-6 col-md-3">
                                    <a href="#" class="thumbnail">
                                        <img width="200" src="{!! asset('uploads/nina-1.jpg') !!}" alt="" class="img-thumbnail">
                                    </a>
                                </div>
                                <div class="col-xs-6 col-md-3">
                                    <a href="#" class="thumbnail">
                                        <img width="200" src="{!! asset('uploads/nina-1.jpg') !!}" alt="" class="img-thumbnail">
                                    </a>
                                </div>
                                <div class="col-xs-6 col-md-3">
                                    <a href="#" class="thumbnail">
                                        <img width="200" src="{!! asset('uploads/nina-1.jpg') !!}" alt="" class="img-thumbnail">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            adsfasdfasdfasdf
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

</body>
</html>
