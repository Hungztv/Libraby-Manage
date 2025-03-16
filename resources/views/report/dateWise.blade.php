@extends('layouts.app')
@section('content')
    <div id="admin-content">
        <div class="container">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <h2 class="admin-heading text-center">Báo cáo phát hành sách theo ngày</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <form class="yourform mb-5" action="{{ route('reports.date_wise_generate') }}" method="post">
                        @csrf
                        <div class="form-group date-picker-container">
                            <label for="report-date" class="date-label">Chọn Ngày</label>
                            <div class="date-input-wrapper">
                                <input type="date" id="report-date" name="date" class="form-control date-input" value="{{ date('Y-m-d') }}">
                                <i class="date-icon"></i>
                            </div>
                            @error('date')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <input type="submit" class="btn btn-primary" name="search_date" value="Tạo báo cáo">
                    </form>
                </div>
            </div>
            @if ($books)
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="content-table">
                                <thead>
                                    <th>S.No</th>
                                    <th>Student Name</th>
                                    <th>Book Name</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>Issue Date</th>
                                </thead>
                                <tbody>
                                    @forelse ($books as $book)
                                        <tr>
                                            <td>{{ $book->id }}</td>
                                            <td>{{ $book->student->name }}</td>
                                            <td>{{ $book->book->name }}</td>
                                            <td>{{ $book->student->phone }}</td>
                                            <td>{{ $book->student->email }}</td>
                                            <td>{{ $book->issue_date->format('d M, Y') }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="10">No Record Found!</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
<style>
/* General Settings */
#admin-content {
    padding: 60px 0;
    background-color: #f8f9fa;
    min-height: 100vh;
}

.container {
    max-width: 1240px;
}

/* Page Title */
.admin-heading {
    color: #2c3e50;
    font-weight: 600;
    font-size: 32px;
    margin-bottom: 40px;
    position: relative;
    padding-bottom: 15px;
    letter-spacing: 0.5px;
}

.admin-heading:after {
    content: "";
    position: absolute;
    width: 100px;
    height: 4px;
    background: linear-gradient(to right, #3498db, #2980b9);
    bottom: 0;
    left: 50%;
    transform: translateX(-50%);
    border-radius: 2px;
}

/* Search Form */
.yourform {
    background-color: #fff;
    padding: 30px;
    border-radius: 12px;
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
    margin-bottom: 40px !important;
    border: 1px solid #e9ecef;
}

.form-group {
    margin-bottom: 25px;
}

/* Enhanced Date Picker */
.date-picker-container {
    position: relative;
}

.date-label {
    display: block;
    margin-bottom: 10px;
    font-weight: 500;
    color: #34495e;
    font-size: 16px;
}

.date-input-wrapper {
    position: relative;
    display: flex;
    align-items: center;
}

.date-input {
    height: 50px;
    border: 2px solid #e0e0e0;
    border-radius: 8px;
    padding: 12px 15px;
    font-size: 16px;
    transition: all 0.3s ease;
    width: 100%;
    background-color: #f9f9f9;
    color: #333;
    cursor: pointer;
    box-shadow: inset 0 1px 3px rgba(0,0,0,0.05);
}

.date-input:focus {
    border-color: #3498db;
    box-shadow: 0 0 0 3px rgba(52, 152, 219, 0.2);
    outline: none;
    background-color: #fff;
}

.date-icon {
    position: absolute;
    right: 15px;
    top: 50%;
    transform: translateY(-50%);
    pointer-events: none;
    width: 22px;
    height: 22px;
    background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='%233498db'%3E%3Cpath d='M20 3h-1V1h-2v2H7V1H5v2H4c-1.1 0-2 .9-2 2v16c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm0 18H4V10h16v11zm0-13H4V5h16v3z'/%3E%3C/svg%3E");
    background-size: contain;
    background-repeat: no-repeat;
}

/* Submit Button */
.btn-primary {
    background: linear-gradient(135deg, #3498db, #2980b9);
    border: none;
    padding: 14px 28px;
    border-radius: 8px;
    color: #fff;
    font-weight: 500;
    letter-spacing: 0.5px;
    transition: all 0.3s ease;
    display: block;
    width: 100%;
    font-size: 16px;
    text-transform: uppercase;
}

.btn-primary:hover {
    background: linear-gradient(135deg, #2980b9, #1c6391);
    transform: translateY(-2px);
    box-shadow: 0 8px 20px rgba(52, 152, 219, 0.3);
}

/* Error Messages */
.alert-danger {
    background-color: #fff0f0;
    color: #e74c3c;
    border-radius: 6px;
    font-size: 14px;
    padding: 12px 16px;
    margin-top: 8px;
    border-left: 4px solid #e74c3c;
}

/* Enhanced Data Table */
.table-responsive {
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
}

.content-table {
    width: 100%;
    border-collapse: separate;
    border-spacing: 0;
    background-color: #fff;
    margin-bottom: 40px;
}

.content-table thead {
    background: linear-gradient(135deg, #f1f8fe, #e6f3fc);
}

.content-table th {
    padding: 18px 20px;
    text-align: left;
    font-weight: 600;
    font-size: 15px;
    color: #2c3e50;
    border-bottom: 2px solid #e9ecef;
    letter-spacing: 0.5px;
    text-transform: uppercase;
}

.content-table td {
    padding: 16px 20px;
    border-bottom: 1px solid #e9ecef;
    font-size: 15px;
    color: #555;
    vertical-align: middle;
}

.content-table tbody tr:last-child td {
    border-bottom: none;
}

.content-table tbody tr:hover {
    background-color: #f8f9fa;
}

/* No Data Message */
.content-table td[colspan="10"] {
    text-align: center;
    padding: 40px 15px;
    color: #7f8c8d;
    font-style: italic;
    font-size: 16px;
}

/* Responsive Design */
@media (max-width: 991px) {
    .container {
        max-width: 95%;
    }
    
    .col-md-6.offset-md-3 {
        width: 70%;
        margin-left: 15%;
    }
}

@media (max-width: 768px) {
    .col-md-8.offset-md-2,
    .col-md-6.offset-md-3 {
        margin-left: 0;
        width: 100%;
    }
    
    .admin-heading {
        font-size: 28px;
        margin-bottom: 30px;
    }
    
    .yourform {
        padding: 20px;
    }
    
    .content-table thead th,
    .content-table tbody td {
        padding: 14px 12px;
        font-size: 14px;
    }
    
    .date-input {
        height: 45px;
        font-size: 15px;
    }
    
    .btn-primary {
        padding: 12px 20px;
        font-size: 15px;
    }
}
</style>
@endsection