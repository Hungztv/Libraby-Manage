@extends('layouts.guest')

@section('content')
<<<<<<< HEAD
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
=======
<section>
    <div class="form-box">
        <div class="form-value">
            <form action="{{ route('login') }}" method="post">
                @csrf
                <h2>Login</h2>
                <div class="inputbox">
                    <ion-icon name="mail-outline"></ion-icon>
                    <input type="text" name="username" class="@error('username') is-invalid @enderror" value="{{ old('username') }}" required>
                    <label>Username</label>
                    @error('username')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>
                <div class="inputbox">
                    <ion-icon name="lock-closed-outline"></ion-icon>
                    <input type="password" name="password" required>
                    <label>Password</label>
                </div>
                <div class="forget">
                    <label><input type="checkbox">Remember Me</label>
                    <a href="#">Forgot Password</a>
                </div>
                <button type="submit">Log In</button>
                <div class="register">
                    <p>Don't have an account? <a href="#">Sign Up</a></p>
                </div>
            </form>
        </div>
    </div>
</section>

<style>
* {
    margin: 0;
    padding: 0;
    font-family: "Trebuchet MS", "Lucida Sans Unicode", "Lucida Grande", "Lucida Sans", Arial, sans-serif;
}

section {
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    width: 100%;
    background: url("{{ asset('Screenshots/brown.png') }}") no-repeat;
    background-position: center;
    background-size: cover;
}

.form-box {
    position: relative;
    width: 400px;
    height: 450px;
    background: transparent;
    border: none;
    border-radius: 20px;
    backdrop-filter: blur(15px) brightness(80%);
    display: flex;
    justify-content: center;
    align-items: center;
}

h2 {
    font-size: 2em;
    color: #fff;
    text-align: center;
}

.inputbox {
    position: relative;
    margin: 30px 0;
    width: 310px;
    border-bottom: 2px solid #fff;
}

.inputbox label {
    position: absolute;
    top: 50%;
    left: 5px;
    transform: translateY(-50%);
    color: #fff;
    font-size: 1em;
    pointer-events: none;
    transition: 0.5s;
}

/* animations: start */
input:focus~label,
input:valid~label {
    top: -5px;
}

/* animation:end */
.inputbox input {
    width: 100%;
    height: 50px;
    background: transparent;
    border: none;
    outline: none;
    font-size: 1em;
    padding: 0 35px 0 5px;
    color: #fff;
}

.inputbox ion-icon {
    position: absolute;
    right: 8px;
    color: #fff;
    font-size: 1.2em;
    top: 20px;
}

.forget {
    margin: -10px 0 17px;
    font-size: 0.9em;
    color: #fff;
    display: flex;
    justify-content: space-between;
}

.forget label input {
    margin-right: 3px;
}

.forget a {
    color: #fff;
    text-decoration: none;
}

.forget a:hover {
    text-decoration: underline;
}

button {
    width: 100%;
    height: 40px;
    border-radius: 40px;
    background-color: #fff;
    border: none;
    outline: none;
    cursor: pointer;
    font-size: 1em;
    font-weight: 600;
}

.register {
    font-size: 0.9em;
    color: #fff;
    text-align: center;
    margin: 25px 0 10px;
}

.register p a {
    text-decoration: none;
    color: #fff;
    font-weight: 600;
}

.register p a:hover {
    text-decoration: underline;
}

@media screen and (max-width: 480px) {
    .form-box {
        width: 100%;
        border-radius: 0px;
    }
}
</style>

<!-- Thêm script cho ion-icons -->
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
@endsection
>>>>>>> master
