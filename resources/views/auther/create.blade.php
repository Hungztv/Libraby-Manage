@extends('layouts.app')

@section('content')
<div id="admin-content">
    <div class="container">
        <!-- Tiêu đề -->
        <div class="row">
            <div class="col-md-12 text-center">
                <h2 class="admin-heading">📝 Thêm Tác Giả</h2>
                <hr style="border-top: 2px solid #6e6767; width: 50%;">
            </div>
        </div>

        <!-- Nút xem danh sách -->
        <div class="row mb-3">
            <div class="col-md-12 text-right">
                <a class="btn btn-primary" href="{{ route('authors') }}">📚 Danh Sách Tác Giả</a>
            </div>
        </div>

        <!-- Form thêm tác giả -->
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form class="yourform p-4 bg-white shadow rounded" action="{{ route('authors.store') }}" method="post" autocomplete="off">
                    @csrf
                    <div class="form-group">
                        <label>📌 Tên Tác Giả</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" 
                               placeholder="Nhập tên tác giả" name="name" value="{{ old('name') }}" required>
                        @error('name')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="text-center">
                        <button type="submit" class="btn btn-success px-4 py-2">✔️ Thêm Tác Giả</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
