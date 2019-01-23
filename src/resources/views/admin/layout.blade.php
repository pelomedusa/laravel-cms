<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin | {{ config("cms.site.nicename")  }}</title>

    <link rel="stylesheet" href="/cms/admin/css/fontawsome-all.min.css">
    <link rel="stylesheet" href="/cms/admin/css/bootstrap.min.css">
    <link rel="stylesheet" href="/cms/admin/css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="/cms/admin/css/bootstrap-reboot.min.css">
    <link rel="stylesheet" href="/cms/admin/css/sidebar.css">
    <link rel="stylesheet" href="/cms/admin/css/admin.css">

</head>
<body>
    @include("cms::admin.sidebar")
</body>
<footer>
    @stack("scripts")
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="/cms/admin/js/bootstrap.min.js"></script>
    <script src="/cms/admin/js/bootstrap.bundle.min.js"></script>

</footer>
</html>