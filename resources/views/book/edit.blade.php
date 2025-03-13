@extends('layouts.app')

@section('content')
    <div id="admin-content">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <h2 class="admin-heading">Cập Nhật Sách</h2>
                </div>
            </div>

            <div class="row justify-content-center mt-4">
                <div class="col-md-6">
                    <form class="yourform" action="{{ route('book.update', $book->id) }}" method="post" autocomplete="off">
                        @csrf

                        <!-- Tên Sách -->
                        <div class="form-group">
                            <label>Tên Sách</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                placeholder="Nhập tên sách" name="name" value="{{ $book->name }}">
                            @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Thể Loại -->
                        <div class="form-group">
                            <label>Thể Loại</label>
                            <select class="form-control @error('category_id') is-invalid @enderror" name="category_id">
                                <option value="">Chọn Thể Loại</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" {{ $category->id == $book->category_id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Tác Giả -->
                        <div class="form-group">
                            <label>Tác Giả</label>
                            <select class="form-control @error('auther_id') is-invalid @enderror" name="author_id">
                                <option value="">Chọn Tác Giả</option>
                                @foreach ($authors as $auther)
                                    <option value="{{ $auther->id }}" {{ $auther->id == $book->auther_id ? 'selected' : '' }}>
                                        {{ $auther->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('auther_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Nhà Xuất Bản -->
                        <div class="form-group">
                            <label>Nhà Xuất Bản</label>
                            <select class="form-control @error('publisher_id') is-invalid @enderror" name="publisher_id">
                                <option value="">Chọn Nhà Xuất Bản</option>
                                @foreach ($publishers as $publisher)
                                    <option value="{{ $publisher->id }}" {{ $publisher->id == $book->publisher_id ? 'selected' : '' }}>
                                        {{ $publisher->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('publisher_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Nút Cập Nhật -->
                        <div class="text-center mt-4">
                            <button type="submit" class="btn btn-danger">Cập Nhật</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
