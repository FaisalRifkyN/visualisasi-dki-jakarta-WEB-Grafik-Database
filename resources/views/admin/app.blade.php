<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/png" href="./assets/img/logo.png" />
    <title>Admin DKI Jakarta</title>
    

    @include('admin/layout/head')
</head>

<body class="g-sidenav-show bg-gray-100">
    @include('admin/layout/sidemenu')
    @include('admin/layout/navbar')

    <div class="content">
        @yield('content')
    </div>

    @include('admin/layout/footer')
</body>

</html>