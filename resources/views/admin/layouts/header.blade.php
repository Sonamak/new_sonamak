<head>

    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="Description" content="Bootstrap Responsive Admin Web Dashboard HTML5 Template">
    <meta name="Author" content="Sonamak">
    <meta name="Keywords" content="Sonamak,voyager,godiscoveregypt"/>
    <!-- Csrf Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Title -->
    <title> {{ app()->make('setup',['type' => 'website title'])[0]; }} -  Adminpanal </title>

    <!-- Favicon -->
    <link rel="icon" href="@if(app()->make('setup',['type' => 'short logo'])[0])  {{ asset('storage/system/small/'.app()->make('setup',['type' => 'short logo'])[0]) }} @else {{ asset('admin/img/brand/favicon.png') }} @endif " type="image/x-icon"/>

    <!-- Custom css -->
    <link href="{{ asset('admin/css/custom.css') }}" rel="stylesheet">

    <!-- Icons css -->
    <link href="{{ asset('admin/css/icons.css') }}" rel="stylesheet">

    <!--  bootstrap css-->
    <link href="{{ asset('admin/css/icons.css') }}" rel="stylesheet" />

    <!-- P-scroll bar css-->
    <link href="{{ asset('admin/plugins/perfect-scrollbar/p-scrollbar.css') }}" rel="stylesheet" />

    <!--  Right-sidemenu css -->
    <link href="{{ asset('admin/plugins/sidebar/sidebar.css') }}" rel="stylesheet">

    <!-- style css -->
    <link href="{{ asset('admin/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/css/style-dark.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/css/style-transparent.css') }}" rel="stylesheet">

    <!---Skinmodes css-->
    <link href="{{ asset('admin/css/skin-modes.css') }}" rel="stylesheet" />

    <!-- Summernote -->
    <link href="{{ asset('admin/plugins/summernote-editor/summernote1.css') }}" rel="stylesheet">

    <!-- INTERNAL Select2 css -->
    <link href="{{ asset('admin/plugins/select2/css/select2.min.css') }}" rel="stylesheet" />

    <!-- Tagify -->
    <link href="{{ asset('admin/css/tagify.css') }}" rel="stylesheet" />

    <!-- INTERNAL Data table css -->
    <link href="{{ asset('admin/plugins/datatable/css/dataTables.bootstrap5.css') }}" rel="stylesheet" />
    <link href="{{ asset('admin/plugins/datatable/css/buttons.bootstrap5.min.css') }}"  rel="stylesheet">
    <link href="{{ asset('admin/plugins/datatable/responsive.bootstrap5.css') }}" rel="stylesheet" />

    
    <!---Internal Fileupload css-->
    <link href="{{ asset('admin/plugins/fileuploads/css/fileupload.css') }}" rel="stylesheet" type="text/css"/>

    <!---Internal Fancy uploader css-->
    <link href="{{ asset('admin/plugins/fancyuploder/fancy_fileupload.css') }}" rel="stylesheet" />
</head>