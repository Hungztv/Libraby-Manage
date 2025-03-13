@extends('layouts.app')
@section('content')
    <div id="admin-content">
        <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h2 class="admin-heading">📂 Danh Sách Thể Loại</h2>
                <hr style="border-top: 2px solid #6e6767; width: 50%;">
            </div>
        </div>
        <div class="row">
        <div class="offset-md-5 col-md-12">
                    <a class="add-new" href="{{ route('category.create') }}">➕ Thêm Thể Loại</a>
                </div>
        </div>
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
                                @forelse ($categories as $category)
                                    <tr class="text-center align-middle">
                                        <td>{{ $category->id }}</td>
                                        <td>{{ $category->name }}</td>
                                        <td class="edit">
                                            <a href="{{ route('category.edit', $category) }}" class="btn btn-warning btn-sm">✏️</a>
                                        </td>
                                        <td class="delete">
                                            <form action="{{ route('category.destroy', $category) }}" method="post" class="d-inline">
                                                @csrf
                                                <button class="btn btn-danger">🗑️</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center">Không có thể loại nào</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <div class="pagination-wrapper">
                            {{ $categories->links('vendor/pagination/bootstrap-4') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection