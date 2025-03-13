@extends('layouts.app')
@section('content')
    <div id="admin-content">
        <div class="container">
            <!-- Tiêu đề Dashboard -->
            <div class="row">
                <div class="col-md-12 text-center">
                    <h2 class="admin-heading">📊 Bảng Điều Khiển</h2>
                    <hr style="border-top: 2px solid #6e6767; width: 50%;">
                </div>
            </div>

            <!-- Thẻ hiển thị số liệu -->
            <div class="row justify-content-center">
            <div class="col-md-4 mb-4">
    <a href="{{ route('authors') }}" class="text-decoration-none">
        <div class="card custom-card">
            <div class="card-body text-center">
                <p class="card-text count">{{ $authors }}</p>
                <h5 class="card-title">📚 Tác Giả</h5>
            </div>
        </div>
    </a>
</div>
<div class="col-md-4 mb-4">
    <a href="{{ route('publishers') }}" class="text-decoration-none">
        <div class="card custom-card">
            <div class="card-body text-center">
                <p class="card-text count">{{ $publishers }}</p>
                <h5 class="card-title">🏢 Nhà Xuất Bản</h5>
            </div>
        </div>
    </a>
</div>
<div class="col-md-4 mb-4">
    <a href="{{ route('categories') }}" class="text-decoration-none">
        <div class="card custom-card">
            <div class="card-body text-center">
                <p class="card-text count">{{ $categories }}</p>
                <h5 class="card-title">📂 Thể Loại</h5>
            </div>
        </div>
    </a>
</div>
<div class="col-md-4 mb-4">
    <a href="{{ route('books') }}" class="text-decoration-none">
        <div class="card custom-card">
            <div class="card-body text-center">
                <p class="card-text count">{{ $books }}</p>
                <h5 class="card-title">📖 Sách Được Liệt Kê</h5>
            </div>
        </div>
    </a>
</div>
<div class="col-md-4 mb-4">
    <a href="{{ route('students') }}" class="text-decoration-none">
        <div class="card custom-card">
            <div class="card-body text-center">
                <p class="card-text count">{{ $students }}</p>
                <h5 class="card-title">🎓 Sinh Viên Đã Đăng Ký</h5>
            </div>
        </div>
    </a>
</div>
<div class="col-md-4 mb-4">
    <a href="{{ route('book_issued') }}" class="text-decoration-none">
        <div class="card custom-card">
            <div class="card-body text-center">
                <p class="card-text count">{{ $issued_books }}</p>
                <h5 class="card-title">📌 Sách Đang Được Mượn</h5>
            </div>
        </div>
    </a>
</div>
                
            </div>
        </div>
    </div>
@endsection
