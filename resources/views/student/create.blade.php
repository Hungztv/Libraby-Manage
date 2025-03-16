@extends('layouts.app')
@section('content')
    <div id="admin-content">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <h2 class="admin-heading">Add Student</h2>
                </div>
                <div class="offset-md-7 col-md-2">
                    <a class="add-new" href="{{ route('students') }}">All Students</a>
                </div>
            </div>
            <div class="row">
                <div class="offset-md-3 col-md-6">
                    <form class="yourform" action="{{ route('student.store') }}" method="post" autocomplete="off">
                        @csrf
                        <div class="form-group">
                            <label>Student Name</label>
                            <input type="text" class="form-control" placeholder="Student Name" name="name"
                                value="{{ old('name') }}" required>
                            @error('name')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Address</label>
                            <input type="text" class="form-control" placeholder="Address" name="address"
                                value="{{ old('address') }}" required>
                            @error('address')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Gender</label>
                            <select name="gender" class="form-control">
                                <option value="male" selected>Male</option>
                                <option value="female">Female</option>
                            </select>
                            @error('gender')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Class</label>
                            <input type="text" class="form-control" placeholder="Class" name="class"
                                value="{{ old('class') }}" required>
                            @error('class')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Age</label>
                            <input type="number" class="form-control" placeholder="Age" name="age"
                                value="{{ old('age') }}" required>
                            @error('age')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Phone</label>
                            <input type="phone" class="form-control" placeholder="Phone" name="phone"
                                value="{{ old('phone') }}" required>
                            @error('phone')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" placeholder="Email" name="email"
                                value="{{ old('email') }}" required>
                            @error('email')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <input type="submit" name="save" class="btn btn-danger" value="save">
                    </form>
                </div>
            </div>
        </div>
    </div>

<style>
    /* Reset và thiết lập chung */
#admin-content {
    padding: 40px 0;
    background-color: #f8f9fa;
    min-height: 100vh;
}

#admin-content .container {
    max-width: 1140px;
    margin: 0 auto;
}

/* Tiêu đề và nút All Students */
.admin-heading {
    color: #343a40;
    font-size: 24px;
    font-weight: 600;
    margin-bottom: 20px;
    position: relative;
    padding-bottom: 10px;
}

.admin-heading:after {
    content: "";
    position: absolute;
    left: 0;
    bottom: 0;
    height: 3px;
    width: 50px;
    background-color: #dc3545;
}

.add-new {
    display: inline-block;
    background-color: #343a40;
    color: #fff;
    padding: 8px 16px;
    border-radius: 4px;
    text-decoration: none;
    transition: all 0.3s ease;
    text-align: center;
    font-weight: 500;
}

.add-new:hover {
    background-color: #dc3545;
    color: #fff;
    transform: translateY(-2px);
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

/* Form thiết kế */
.yourform {
    background-color: #fff;
    padding: 30px;
    border-radius: 8px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.05);
}

.form-group {
    margin-bottom: 20px;
}

.form-group label {
    display: block;
    margin-bottom: 8px;
    color: #343a40;
    font-weight: 500;
}

.form-control {
    width: 100%;
    padding: 12px 15px;
    border: 1px solid #e0e0e0;
    border-radius: 4px;
    transition: all 0.3s ease;
    font-size: 14px;
}

.form-control:focus {
    border-color: #80bdff;
    outline: 0;
    box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
}

select.form-control {
    height: 45px;
    appearance: none;
    background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 12 12'%3E%3Cpath fill='%23343a40' d='M6 8.825l4.475-4.475 1.06 1.06L6 10.945 0.465 5.41l1.06-1.06L6 8.825z'/%3E%3C/svg%3E");
    background-repeat: no-repeat;
    background-position: right 15px center;
    padding-right: 30px;
}

/* Thông báo lỗi */
.alert-danger {
    background-color: #f8d7da;
    color: #721c24;
    padding: 8px 12px;
    border-radius: 4px;
    margin-top: 5px;
    font-size: 13px;
    border: 1px solid #f5c6cb;
}

/* Nút submit */
.btn-danger {
    background-color: #dc3545;
    color: #fff;
    border: none;
    padding: 12px 25px;
    border-radius: 4px;
    cursor: pointer;
    font-weight: 500;
    letter-spacing: 0.5px;
    transition: all 0.3s ease;
    display: block;
    width: 100%;
    margin-top: 10px;
}

.btn-danger:hover {
    background-color: #c82333;
    box-shadow: 0 4px 8px rgba(220, 53, 69, 0.3);
    transform: translateY(-2px);
}

/* Responsive */
@media (max-width: 768px) {
    .offset-md-3.col-md-6,
    .col-md-3,
    .offset-md-7.col-md-2 {
        width: 100%;
        margin-left: 0;
        padding: 0 15px;
    }
    
    .add-new {
        margin-bottom: 20px;
        display: block;
    }
    
    .yourform {
        padding: 20px;
    }
}
</style>
@endsection
