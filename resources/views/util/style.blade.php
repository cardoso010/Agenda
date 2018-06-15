
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<title>..:: SIGAPUAM ::..</title>
    <!-- Styles -->
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" />
<link href="{{ asset('css/animate.min.css') }}" rel="stylesheet"/>
<link href="{{ asset('css/light-bootstrap-dashboard.css?v=1.4.0') }}" rel="stylesheet"/>
<link href="{{ asset('css/demo.css') }}" rel="stylesheet" />
<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
<link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
<link href="{{ asset('css/pe-icon-7-stroke.css') }}" rel="stylesheet" />

<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/jquery.3.2.1.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/bootstrap.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/bootstrap-notify.js') }}"></script>

<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    
<!-- Styles -->
<script>
    function formataData(data) {
    return new Date(data).toLocaleString()
    }
</script>