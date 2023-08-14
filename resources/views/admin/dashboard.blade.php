@extends('layouts.admin')

@section('content')


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--make so of changes here from git  -->
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon/logo.ico') }}">
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    <!--zzzzzz<link href="{{ asset('css/footer.css') }}" rel="stylesheet">-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Latest compiled JavaScript -->
    <script src="{{ asset('bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('JavaScript/myScript.js') }}"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>


    <!-- Replace the URLs with the correct paths to your DevExpress files -->
    <link rel="stylesheet" type="text/css" href="https://cdn3.devexpress.com/jslib/21.2.6/css/dx.common.css">
    <link rel="stylesheet" type="text/css" href="https://cdn3.devexpress.com/jslib/21.2.6/css/dx.light.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        window.jQuery || document.write(decodeURIComponent('%3Cscript src="js/jquery.min.js"%3E%3C/script%3E'))
    </script>
    <link rel="stylesheet" type="text/css" href="https://cdn3.devexpress.com/jslib/23.1.3/css/dx.light.css" />
    <script src="https://unpkg.com/devextreme-quill@1.6.2/dist/dx-quill.min.js"></script>
    <script src="https://cdn3.devexpress.com/jslib/23.1.3/js/dx.all.js"></script>

    <script src="{{ asset('JavaScript/toolbar.js') }}"></script>

</head>


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    <h1>Welcome Admin Panel</h1>
                </div>
            </div>
<br>

            <div class="card">
                <div class="card-header">{{ __('Quick Links') }}</div>
                <div class="card-body">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">View All Articles</h5>
                            <p class="card-text">Click here to view all articles.</p>
                            <a href="{{ route('admin.articles.index') }}" class="btn btn-primary">Go</a>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">View All Categories</h5>
                            <p class="card-text">Click here to view all categories.</p>
                            <a href="{{ route('admin.categories.index') }}" class="btn btn-primary">Go</a>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">View All Users</h5>
                            <p class="card-text">Click here to view all users.</p>
                            <a href="{{ route('admin.users.index') }}" class="btn btn-primary">Go</a>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">View All Comments</h5>
                            <p class="card-text">Click here to view all comments.</p>
                            <a href="{{ route('admin.comments.index') }}" class="btn btn-primary">Go</a>
                        </div>
                    </div>
                </div>
            </div>


        </div>

        <div class="col-md-4">
            <div class="card mb-4">
                <h5 class="card-header">Search</h5>
                <div class="card-body">
                    <form action="{{ route('admin.articles.search') }}" method="GET">
                        <div class="input-group">
                            <input type="text" name="searchtitle" class="form-control" placeholder="Search for..." required>
                            <span class="input-group-btn">
                                <button class="btn btn-primary" type="submit">Go!</button>
                            </span>
                        </div>
                    </form>
                </div>
            </div>

            <div class="card">
                <div class="card-header">{{ __('Latest Articles') }}</div>
                <div class="card-body">
                    <ul>
                        @foreach ($articles->sortByDesc('created_at')->take(5) as $article)
                        <li><a href="{{ route('admin.articles.show', $article->id) }}">{{ $article->title }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <br>
            <div class="card">
                <div class="card-header">{{ __('Category Links') }}</div>
                <div class="card-body">
                    <ul>
                        @foreach($categories as $category)
                        <li><a href="{{ route('admin.categories.show', $category->id) }}">{{ $category->name }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <br>

        </div>
    </div>
</div>
</div>
@endsection
