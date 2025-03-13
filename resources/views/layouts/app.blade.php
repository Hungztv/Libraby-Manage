<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>{{ config('app.name', 'Library Management System') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <!-- Bootstrap & Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    <!-- HEADER -->
    <header id="header">
        <div class="container d-flex justify-content-between align-items-center">
            <div class="logo">
                <a href="#"><img src="{{ asset('images/library.png') }}" alt="Library Logo"></a>
            </div>
            <div class="dropdown">
                <button class="btn btn-primary dropdown-toggle" type="button" id="userDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Hi, {{ auth()->user()->name }}
                </button>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="{{ route('change_password') }}">🔑 Đổi mật khẩu</a>
                    <a class="dropdown-item text-danger" href="#" onclick="document.getElementById('logoutForm').submit()">🚪 Đăng xuất</a>
                </div>
                <form method="post" id="logoutForm" action="{{ route('logout') }}" class="d-none">
                    @csrf
                </form>
            </div>
        </div>
    </header>
    <!-- /HEADER -->

    <!-- MENU BAR -->
    <nav id="menubar">
        <div class="container">
            <ul class="menu d-flex justify-content-center">
                <li><a href="{{ route('dashboard') }}">🏠 Trang chủ</a></li>
                <li><a href="{{ route('authors') }}">📚 Tác giả</a></li>
                <li><a href="{{ route('publishers') }}">🏢 Nhà xuất bản</a></li>
                <li><a href="{{ route('categories') }}">📂 Thể loại</a></li>
                <li><a href="{{ route('books') }}">📖 Sách</a></li>
                <li><a href="{{ route('students') }}">🎓 Sinh viên</a></li>
                <li><a href="{{ route('book_issued') }}">📌 Sách đã mượn</a></li>
                <li><a href="{{ route('reports') }}">📊 Báo cáo</a></li>
                <li><a href="{{ route('settings') }}">⚙️ Cài đặt</a></li>
            </ul>
        </div>
    </nav>
    <!-- /MENU BAR -->

    <!-- MAIN CONTENT -->
    <main class="container py-4">
        @yield('content')
    </main>
    <!-- /MAIN CONTENT -->

    <!-- FOOTER -->
    <footer id="footer">
        <div class="container text-center">
            <span>© {{ now()->format("Y") }} Library Management System | Developed by <a href="#">Your Name</a></span>
        </div>
    </footer>
    <!-- /FOOTER -->

    <!-- Scripts -->
    <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>
