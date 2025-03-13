@extends('layouts.app')
@section('content')
    <div id="admin-content">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h2 class="admin-heading">📖 Danh Sách Nhà Xuất Bản</h2>
                    <hr style="border-top: 2px solid #6e6767; width: 50%;">
                </div>
            </div>
            <div class="row mb-3">
                
                <div class="offset-md-5 col-md-2 text-right">
                    <a class="btn btn-primary px-3 py-2" href="{{ route('publisher.create') }}">
                        ➕ Thêm Nhà Xuất Bản
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="message"></div>
                    <table class="table table-striped table-bordered">
                        <thead class="thead-dark">
                            <tr class="text-center">
                                <th>#️⃣ Số Thứ Tự</th>
                                <th>🏢 Tên Nhà Xuất Bản</th>
                                <th>✏️ Chỉnh Sửa</th>
                                <th>🗑️ Xóa</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($publishers as $publisher)
                                <tr class="text-center">
                                    <td>{{ $publisher->id }}</td>
                                    <td>{{ $publisher->name }}</td>
                                    <td>
                                        <a href="{{ route('publisher.edit', $publisher) }}" class="btn btn-success">
                                            ✏️ Sửa
                                        </a>
                                    </td>
                                    <td>
                                        <form action="{{ route('publisher.destroy', $publisher) }}" method="post"
                                            class="d-inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">
                                                🗑️ Xóa
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center text-danger font-weight-bold">
                                        ❌ Không có nhà xuất bản nào!
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-center">
                        {{ $publishers->links('vendor/pagination/bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
