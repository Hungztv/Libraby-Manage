@extends('layouts.app')

@section('content')
<div id="admin-content">
    <div class="container">
        <!-- Tiêu đề -->
        <div class="row">
            <div class="col-md-12 text-center">
                <h2 class="admin-heading">📚 Danh Sách Tác Giả</h2>
                <hr style="border-top: 2px solid #6e6767; width: 50%;">
            </div>
        </div>

        <!-- Nút Thêm -->
        <div class="row">
        <div class="offset-md-5 col-md-12">
                    <a class="add-new" href="{{ route('authors.create') }}">➕ Thêm Tác Giả</a>
                </div>
        </div>

        <!-- Bảng dữ liệu -->
        <div class="row justify-content-center">
            <div class="col-md-10">
                <table class="table table-bordered table-hover shadow-sm">
                    <thead class="bg-dark text-white text-center">
                        <tr>
                            <th>#</th>
                            <th>Tên Tác Giả</th>
                            <th>✏️ Chỉnh Sửa</th>
                            <th>🗑️ Xóa</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($authors as $auther)
                            <tr class="text-center align-middle">
                                <td>{{ $auther->id }}</td>
                                <td>{{ $auther->name }}</td>
                                <td>
                                    <a href="{{ route('authors.edit', $auther) }}" class="btn btn-warning btn-sm">
                                        ✏️ Sửa
                                    </a>
                                </td>
                                <td>
                                <form action="{{ route('authors.destroy', $auther->id) }}" method="post"
                                            class="form-hidden">
                                            <button class="btn btn-danger delete-author">🗑️ Xóa</button>
                                            @csrf
                                        </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center text-muted">Không có tác giả nào.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                <!-- Phân trang -->
                <div class="d-flex justify-content-center mt-3">
                    {{ $authors->links('vendor/pagination/bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
