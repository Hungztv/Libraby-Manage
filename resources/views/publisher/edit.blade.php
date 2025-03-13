@extends('layouts.app')
@section('content')
<div id="admin-content">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h2 class="admin-heading">✏️ Chỉnh Sửa Nhà Xuất Bản</h2>
                <hr style="border-top: 2px solid #6e6767; width: 50%;">
            </div>
        </div>
        <div class="row">
            <div class="offset-md-3 col-md-6">
                <form  class="your-form" action="{{ route('publisher.update', $publisher->id) }}" method="post" autocomplete="off">
                    @csrf
                  
                    <div class="form-group">
                        <label>🏷️ Tên Nhà Xuất Bản</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                            value="{{ old('name', $publisher->name) }}" required>
                        @error('name')
                            <div class="alert alert-danger mt-2" role="alert">
                                ❌ {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary px-4 py-2">✔️ Cập Nhật</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
