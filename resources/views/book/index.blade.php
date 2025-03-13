@extends('layouts.app')

@section('content')

    <div id="admin-content">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <h2 class="admin-heading">Danh Sách Sách</h2>
                </div>
                <div class="col-md-2 ms-auto text-end">
                    <a class="add-new btn btn-primary" href="{{ route('book.create') }}">Thêm Sách</a>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-md-12">
                    <div class="message"></div>
                    
                    <table class="content-table table table-bordered text-center">
                        <thead class="table-dark">
                            <tr>
                                <th>#</th>
                                <th>Tên Sách</th>
                                <th>Thể Loại</th>
                                <th>Tác Giả</th>
                                <th>Nhà Xuất Bản</th>
                                <th>Trạng Thái</th>
                                <th>Sửa</th>
                                <th>Xóa</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($books as $index => $book)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $book->name }}</td>
                                    <td>{{ $book->category->name }}</td>
                                    <td>{{ $book->auther->name }}</td>
                                    <td>{{ $book->publisher->name }}</td>
                                    <td>
                                        @if ($book->status == 'Y')
                                            <span class='badge badge-success'>Còn Sách</span>
                                        @else
                                            <span class='badge badge-danger'>Đã Mượn</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('book.edit', $book) }}" class="btn btn-success btn-sm">Sửa</a>
                                    </td>
                                    <td>
                                        <form action="{{ route('book.destroy', $book) }}" method="post" class="d-inline">
                                            @csrf
                                            <button type="submit" class="btn btn-danger btn-sm delete-book">Xóa</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="text-center text-muted">Không tìm thấy sách nào</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                    <!-- Pagination -->
                    <div class="d-flex justify-content-center">
                        {{ $books->links('vendor/pagination/bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
