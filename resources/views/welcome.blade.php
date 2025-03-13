@extends('layouts.guest')

@section('content')
    <div id="wrapper-admin">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <!-- Logo -->
                    <div class="text-center mb-3">
                        <img src="{{ asset('images/library.png') }}" alt="Thư viện" class="img-fluid" style="max-width: 120px;">
                    </div>

                    <!-- Form đăng nhập -->
                    <form class="yourform shadow-lg p-4 bg-white rounded" action="{{ route('login') }}" method="post">
                        @csrf
                        <h3 class="heading text-center mb-3">🔐 Đăng nhập quản trị</h3>

                        <!-- Username -->
                        <div class="form-group mb-3">
                            <label>👤 Tên đăng nhập</label>
                            <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" 
                                value="{{ old('username') }}" required placeholder="Nhập tên đăng nhập...">
                            @error('username')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Password -->
                        <div class="form-group mb-3">
                            <label>🔒 Mật khẩu</label>
                            <input type="password" name="password" class="form-control" required placeholder="Nhập mật khẩu...">
                        </div>

                        <!-- Nút đăng nhập -->
                        <button type="submit" class="btn btn-primary w-100">➡️ Đăng nhập</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
