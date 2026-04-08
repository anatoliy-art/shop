<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>E-shop :: @yield('title')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('assets/owlcarousel/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/owlcarousel/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
    <link rel="shortcut icon" href="{{ asset('assets/img/favicon.ico') }}" type="image/x-icon">
</head>
<body>
    <div class="wrapper">

        <header class="header">
            <div class="header-top py-1">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-6 col-sm-4">
                            <div class="header-top-phone d-flex align-items-center h-100">
                                <i class="fa-solid fa-mobile-screen"></i>
                                <a href="tel:+1234567890" class="ms-2">123-456-7890</a>
                            </div>
                        </div>

                        <div class="col-sm-4 d-none d-sm-block">
                            <ul class="social-icons d-flex justify-content-center">
                                <li>
                                    <a href="#">
                                        <i class="fa-brands fa-youtube"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa-brands fa-facebook-f"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa-brands fa-instagram"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>

                        <div class="col-6 col-sm-4">
                            <div class="header-top-account d-flex justify-content-end">

                                @if (Route::has('login'))
                                <div class="btn-group me-2">
                                    <div class="dropdown">
                                        <button class="btn btn-sm dropdown-toggle" type="button"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            Account
                                        </button>
                                        <ul class="dropdown-menu">
                                            @auth
                                                <li>
                                                    <a class="dropdown-item" href="{{ route('dashboard') }}">Dashboard</a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="{{ route('logout') }}">Logout</a>
                                                </li>
                                            @else
                                                <li>
                                                    <a class="dropdown-item" href="{{ route('login') }}">Login</a>
                                                </li>
                                                @if (Route::has('register'))
                                                <li>
                                                    <a class="dropdown-item" href="{{ route('register') }}">Register</a>
                                                </li>
                                                @endif
                                            @endauth
                                        </ul>
                                    </div>
                                </div>
                                @endif

                                <div class="btn-group">
                                    <div class="dropdown">
                                        <button class="btn btn-sm dropdown-toggle" type="button"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            EN
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a class="dropdown-item" href="#">RU</a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="#">DE</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- ./header-top-account -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- ./header-top -->

            <div class="header-middle bg-white py-4">
                <div class="container-fluid">
                    <div class="row align-items-center">

                        <div class="col-sm-6">
                            <a href="{{ route('home') }}" class="header-logo h1">E-Shop</a>
                        </div>

                        <div class="col-sm-6 mt-2 mt-md-0">
                            <form action="{{ route('search') }}" method="GET">
                                @csrf

                                <div class="input-group">
                                    <input type="text" class="form-control" name="s" placeholder="Searching..."
                                        aria-label="Searching..." aria-describedby="button-search">
                                    <button class="btn btn-outline-warning" type="submit" id="button-search">
                                        <i class="fa-solid fa-magnifying-glass"></i>
                                    </button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>

            </div>
            <!-- ./header-middle -->
        </header>

        <div class="header-bottom sticky-top" id="header-nav">
            <nav class="navbar navbar-expand-lg bg-dark" data-bs-theme="dark">
                <div class="container-fluid">
                    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas"
                        data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="offcanvas offcanvas-start" id="offcanvasNavbar" tabindex="-1"
                        aria-labelledby="offcanvasNavbarLabel">
                        <div class="offcanvas-header">
                            <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Catalog</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="offcanvas"
                                aria-label="Close"></button>
                        </div>
                        <div class="offcanvas-body">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href="{{ route('home') }}">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">About</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Contact</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Payment</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Delivery</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                        aria-expanded="false" data-bs-auto-close="outside">
                                        Catalog
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end">
                                        @foreach($tree as $category)
                                        @if(!empty($category['children']))
                                            <li class="nav-item dropend">
                                                <a class="dropdown-item dropdown-toggle" href="#" data-bs-toggle="dropdown"
                                                    data-bs-auto-close="outside">{{ $category['title'] }}</a>
                                                <ul class="dropdown-menu dropdown-menu-end">
                                                    @foreach($category['children'] as $child)
                                                    <li>
                                                        <a class="dropdown-item" href="{{ route('product.category', $child['id']) }}">{{ $child['title'] }}</a>
                                                    </li>
                                                    @endforeach
                                                    <div class="dropdown-divider"></div>
                                                    <a class="dropdown-item" href="{{ route('product.category', $category['id']) }}">All products category</a>
                                                </ul>
                                            </li>
                                        @else 
                                            <li>
                                                <a class="dropdown-item" href="{{ route('product.category', $category['id']) }}">{{ $category['title'] }}</a>
                                            </li>                                           
                                        @endif
                                        @endforeach
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div>
                        <a href="#" class="btn p-1">
                            <i class="fa-solid fa-heart"></i>
                            <span class="badge text-bg-warning cart-badge bg-warning rounded-circle">3</span>
                        </a>

                        <button class="btn p-1" id="cart-open" type="button" data-bs-toggle="offcanvas2"
                            data-bs-target="#offcanvasCart" aria-controls="offcanvasCart">
                            <i class="fa-solid fa-cart-shopping"></i>
                            <span class="badge text-bg-warning cart-badge bg-warning rounded-circle">{{ session()->get('totalQty') ?? 0 }}</span>
                        </button>
                    </div>

                </div>
            </nav>
        </div>
        <!-- ./header-bottom -->

        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasCart" aria-labelledby="offcanvasCartLabel" style="--bs-offcanvas-width: 700px;">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasCartLabel">Cart</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                @if(session()->has('cart') && !empty(session()->get('cart')))
                <div class="table-responsive">
                    <table class="table offcanvasCart-table">
                        <thead>
                            <tr>
                              <th scope="col">#</th>
                              <th scope="col">Фото</th>
                              <th scope="col">Название</th>
                              <th scope="col">Цена</th>
                              <th scope="col">Кол-во</th>
                              <th scope="col">Сумма</th>
                              <th class="text-end" scope="col">Удалить</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach (session('cart') as $key => $value)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td class="product-img-td"><a href="{{ route('product.show', $key) }}"><img src="{{ $value['thumbnail'] ? asset('uploads/' . $value['thumbnail']) : asset('no-image.jpg') }}" alt=""></a>
                                </td>
                                <td><a href="{{ route('product.show', $key) }}">{{ $value['title'] }}</a></td>
                                <td>$ {{ $value['price'] }}</td>
                                <td>&times;{{ $value['quantity'] }}</td>
                                <td>$ {{ $value['summ'] }}</td>
                                <td class="text-end"><a href="{{ route('cart.delete', $key) }}" class="btn btn-danger"><i class="fa-regular fa-circle-xmark"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="6" class="text-end">Total Summ:</td>
                                <td class="text-end">$ {{ session()->get('totalSumm') }}</td>
                            </tr>
                            <tr>
                                <td colspan="6" class="text-end">Total Qty:</td>
                                <td class="text-end">шт {{ session()->get('totalQty') }}</td>
                            </tr>
                        </tfoot>
                    </table>
                </div>

                <div class="text-end mt-3">
                    <a href="{{ route('cart.clear') }}" class="btn btn-outline-danger">Clear Cart</a>
                    <a href="{{ route('cart.index') }}" class="btn btn-outline-warning">Cart</a>
                    <a href="{{ route('home') }}" class="btn btn-outline-secondary">Home</a>
                </div>
                @else
                    <p>List cart is empty...</p>
                    <a href="{{ route('home') }}" class="btn btn-outline-secondary">Home</a>
                @endif
<!--                 <div class="dropdown mt-3">
                    <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                        Dropdown button
                    </button>
                    <ul class="dropdown-menu">
                        <li>
                            <a class="dropdown-item closecart" href="#footer" data-href="footer">Footer</a>
                        </li>
                        <li>
                            <a class="dropdown-item closecart" href="#about" data-href="about">About</a>
                        </li>
                        <li>
                            <a class="dropdown-item closecart" href="#map" data-href="map">Map</a>
                        </li>
                    </ul>
                </div> -->
            </div>
        </div>

    <main class="main">

    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show my-3 mx-3" role="alert">
          {{ session('success') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show my-3 mx-3" role="alert">
          {{ session('error') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if ($errors->any())
    <div class="alert alert-danger alert-dismissible fade show my-3 mx-3" role="alert">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

        @yield('content')

    </main>

        <footer class="footer" id="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3 col-6">
                        <h4>Information</h4>
                        <ul class="list-unstyled">
                            <li><a href="index.html">Home</a></li>
                            <li><a href="#">Payment</a></li>
                            <li><a href="#">Delivery</a></li>
                            <li><a href="#">Contacts</a></li>
                        </ul>
                    </div>

                    <div class="col-md-3 col-6">
                        <h4>Working hours</h4>
                        <ul class="list-unstyled">
                            <li>Paris, str. Bretan</li>
                            <li>mon-fri: 9:00 - 18:00</li>
                        </ul>
                    </div>

                    <div class="col-md-3 col-6">
                        <h4>Contacts</h4>
                        <ul class="list-unstyled">
                            <li><a href="tel:1234567890">123-456-7890</a></li>
                            <li><a href="tel:0987654321">098-765-4321</a></li>
                        </ul>
                    </div>

                    <div class="col-md-3 col-6">
                        <h4>Follow us</h4>
                        <ul class="footer-icons">
                            <li><a href="#"><i class="fa-brands fa-youtube"></i></a></li>
                            <li><a href="#"><i class="fa-brands fa-facebook-f"></i></a></li>
                            <li><a href="#"><i class="fa-brands fa-instagram"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>
    </div>

    <button id="top">
        <i class="fa-solid fa-angles-up"></i>
    </button>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assets/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
</body>
</html>