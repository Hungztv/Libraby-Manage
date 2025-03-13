@extends('layouts.app')

@section('content')
    <div id="admin-content">
        <div class="container">
            <!-- Tiêu đề trang -->
            <div class="row">
                <div class="col-md-12 text-center">
                    <h2 class="admin-heading">📌 Quản Lý Mượn Sách</h2>
                    <hr style="border-top: 2px solid #6e6767; width: 50%;">
                </div>
            </div>

            <!-- Nút thêm sách mượn -->
            <div class="row mb-3">
                <div class="offset-md-6 col-md-6 text-right">
                    <a class="btn btn-primary" href="{{ route('book_issue.create') }}">➕ Thêm Mượn Sách</a>
                </div>
            </div>

            <!-- Bảng danh sách sách đã mượn -->
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-hover table-bordered text-center">
                        <thead class="thead-dark">
                            <tr>
                                <th>#</th>
                                <th>📖 Sinh viên</th>
                                <th>📚 Sách</th>
                                <th>📞 Số điện thoại</th>
                                <th>📧 Email</th>
                                <th>📅 Ngày mượn</th>
                                <th>📆 Hạn trả</th>
                                <th>⚠️ Trạng thái</th>
                                <th>✏️ Chỉnh sửa</th>
                                <th>🗑 Xóa</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($books as $book)
                                <tr style="@if (date('Y-m-d') > $book->return_date->format('Y-m-d') && $book->issue_status == 'N') background:rgba(255,0,0,0.2) @endif">
                                    <td>{{ $book->id }}</td>
                                    <td>{{ $book->student->name }}</td>
                                    <td>{{ $book->book->name }}</td>
                                    <td>{{ $book->student->phone }}</td>
                                    <td>{{ $book->student->email }}</td>
                                    <td>{{ $book->issue_date->format('d M, Y') }}</td>
                                    <td>{{ $book->return_date->format('d M, Y') }}</td>
                                    <td>
                                        @if ($book->issue_status == 'Y')
                                            <span class="badge badge-success">Đã trả</span>
                                        @else
                                            <span class="badge badge-danger">
                                                Đang mượn
                                                @if (date('Y-m-d') > $book->return_date->format('Y-m-d'))
                                                    - Quá hạn {{ now()->diffInDays($book->return_date) }} ngày
                                                @endif
                                            </span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('book_issue.edit', $book->id) }}" class="btn btn-warning btn-sm">✏️ Chỉnh sửa</a>
                                    </td>
                                    <td>
                                        <form action="{{ route('book_issue.destroy', $book) }}" method="post" onsubmit="return confirm('Bạn có chắc chắn muốn xóa?');">
                                            @csrf
                                            <button type="submit" class="btn btn-danger btn-sm">🗑 Xóa</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="10">❌ Không có sách nào đang mượn</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                    <!-- Phân trang -->
                    {{ $books->links('vendor/pagination/bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>
@endsection
