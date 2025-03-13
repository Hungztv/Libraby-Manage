@extends('layouts.app')

@section('content')
    <div id="admin-content">
        <div class="container">
            <!-- Tiêu đề trang -->
            <div class="row">
                <div class="col-md-12 text-center">
                    <h2 class="admin-heading">📌 Thêm Phiếu Mượn Sách</h2>
                    <hr style="border-top: 2px solid #6e6767; width: 50%;">
                </div>
            </div>

            <!-- Form thêm phiếu mượn -->
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <form class="yourform shadow-lg p-4 bg-white rounded" action="{{ route('book_issue.create') }}" method="post" autocomplete="off">
                        @csrf

                        <!-- Chọn Sinh Viên -->
                        <div class="form-group mb-3">
                            <label>🎓 Chọn Sinh Viên</label>
                            <select class="form-control @error('student_id') is-invalid @enderror" name="student_id" required>
                                <option value="">🔽 Chọn sinh viên...</option>
                                @foreach ($students as $student)
                                    <option value="{{ $student->id }}">{{ $student->name }}</option>
                                @endforeach
                            </select>
                            @error('student_id')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Chọn Sách -->
                        <div class="form-group mb-3">
                            <label>📖 Chọn Sách</label>
                            <select class="form-control @error('book_id') is-invalid @enderror" name="book_id" required>
                                <option value="">🔽 Chọn sách...</option>
                                @foreach ($books as $book)
                                    <option value="{{ $book->id }}">{{ $book->name }}</option>
                                @endforeach
                            </select>
                            @error('book_id')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Nút Lưu -->
                        <button type="submit" class="btn btn-primary w-100">📌 Lưu Phiếu Mượn</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
