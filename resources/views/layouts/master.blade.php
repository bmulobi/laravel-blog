<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Blog Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="/css/app.css" rel="stylesheet">
    <script src="/js/app.js"></script>
</head>

<body>

@include ('layouts.nav')

@if(session('message'))
    <div id="flash-message" class="alert alert-success">
        {{ session('message') }}
    </div>
@endif
<div class="blog-header">
    <div class="container">
        <h1 class="blog-title">The Bootstrap Blog</h1>
        <p class="lead blog-description">An example blog template built with Bootstrap.</p>
    </div>
</div>

<div class="container">

    <div class="row">
        <div class="col-sm-8 blog-main">

        @yield ('content')
        </div>

        @include ('layouts.side-bar')

    </div><!-- /.row -->

</div><!-- /.container -->

@include ('layouts.footer')

</body>
</html>

