
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Koala Management Software</title>
    @csrf

    {{--CDN--}}
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet" />



    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
            integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
            crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>

    <script type="text/javascript" src="{{asset('js/form-validation.js')}}"></script>

    <link rel="stylesheet" type="text/css" href="{{asset('lib/DataTables/datatables.min.css')}}"/>

    <script type="text/javascript" src="{{asset('js/neka.js')}}"></script>

    <script src="https://kit.fontawesome.com/c3428d3c0e.js"></script>
</head>
<body>
@if(session()->has('user'))
    <div class="container-fluid bg-light">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light bg-light-blue">
                <a class="navbar-brand" href="/">Koala</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item {{ (request()->is('products*')) ? 'active' : '' }}">
                            <a class="nav-link" href="{{action('ProductController@index')}}">Ürünler</a>
                        </li>
                        <li class="nav-item  {{ (request()->is('brands*')) ? 'active' : '' }}">
                            <a class="nav-link" href="{{action('BrandController@index')}}">Markalar</a>
                        </li>
                        <li class="nav-item  {{ (request()->is('categories*')) ? 'active' : '' }}">
                            <a class="nav-link" href="{{action('CategoryController@index')}}">Kategoriler</a>
                        </li>
                        {{--<li class="nav-item">
                            <a class="nav-link" href="/aliases">Alias</a>
                        </li>--}}
                        {{--<li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Dropdown
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                        </li>--}}
                    </ul>
                    <ul class="navbar-nav">
                        <li class="nav-item"><a class="nav-link" href="/logout">
                                Çıkış
                            </a></li>
                    </ul>
                    {{--<form class="form-inline my-2 my-lg-0">
                        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                    </form>--}}
                </div>
            </nav>
        </div>
    </div>
@endif
<div class="container mt-2">
    <div class="row">
        <div class="col-12">
            @yield('content')
        </div>
    </div>
</div>
</body>
</html>

