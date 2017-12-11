<!DOCTYPE html>
<html lang="Zh_cn" xmlns:v-on="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="theme-color" content="#52768e">
    <title>@yield('title') Admin {{ $site_title or '' }}</title>
    @if(isset($site_css) && $site_css)
        <link href="{{ $site_css }}" rel="stylesheet">
    @else
        <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    @endif
    @yield('css')
    <script>
        window.XblogConfig = <?php echo json_encode([
            'csrfToken' => csrf_token(),
            'github_username' => isset($github_username) ? $github_username : '',
        ]);?>
    </script>
</head>
<body>
@include('admin.layouts.header')
<div id="content-wrap">
    <div class="container">
        @include('admin.partials.errors')
        @include('admin.partials.success')
    </div>
    @yield('content')
</div>
@include('admin.layouts.footer')
@if(isset($site_js) && $site_js)
    <script src="{{ $site_js }}"></script>
@else
    <script src="{{ mix('js/app.js') }}"></script>
@endif
@yield('script')
</body>
</html>
