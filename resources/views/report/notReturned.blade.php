@extends("layouts.app")
@section('content')
    <div id="admin-content">
        <div class="container">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <h2 class="admin-heading text-center">Not Returned Books</h2>
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
                                    <th>Return Date</th>
                                    <th>Over Days</th>
                                </thead>
                                <tbody>
                                    @forelse ($books as $book)
                                        <tr class="{{ (date('Y-m-d') > $book->return_date->format('Y-m-d')) ? 'overdue-row' : '' }}">
                                            <td>{{ $book->id }}</td>
                                            <td>{{ $book->student->name }}</td>
                                            <td>{{ $book->book->name }}</td>
                                            <td>{{ $book->student->phone }}</td>
                                            <td>{{ $book->student->email }}</td>
                                            <td>{{ $book->issue_date->format('d M, Y') }}</td>
                                            <td>{{ $book->return_date->format('d M, Y') }}</td>
                                            <td class="overdue-days">
                                                @php 
                                                $date1 = date_create(date('Y-m-d'));
                                                $date2 = date_create($book->return_date->format('d-m-Y'));
                                                if($date1 > $date2){
                                                  $diff = date_diff($date1,$date2);
                                                  echo $days = $diff->format('%a days');
                                                }else{
                                                  echo '0 days';
                                                } 
                                                @endphp
                                            </td>
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
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}

.container {
    max-width: 1280px;
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
    width: 120px;
    height: 4px;
    background: linear-gradient(to right, #e74c3c, #c0392b);
    bottom: 0;
    left: 50%;
    transform: translateX(-50%);
    border-radius: 2px;
}

/* Enhanced Data Table */
.table-responsive {
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    margin-bottom: 50px;
}

.content-table {
    width: 100%;
    border-collapse: separate;
    border-spacing: 0;
    background-color: #fff;
    margin-bottom: 40px;
}

.content-table thead {
    background: linear-gradient(135deg, #e74c3c, #c0392b);
    color: white;
}

.content-table th {
    padding: 18px 20px;
    text-align: left;
    font-weight: 600;
    font-size: 15px;
    letter-spacing: 0.5px;
    text-transform: uppercase;
    border: none;
}

.content-table td {
    padding: 16px 20px;
    border-bottom: 1px solid #e9ecef;
    font-size: 15px;
    color: #555;
    vertical-align: middle;
    transition: all 0.2s ease;
}

.content-table tbody tr:last-child td {
    border-bottom: none;
}

/* Special styling for overdue books */
.overdue-row {
    background-color: #fff9f9 !important;
}

.overdue-row:hover {
    background-color: #fff0f0 !important;
}

.overdue-row td {
    color: #e74c3c;
}

.overdue-days {
    font-weight: 600;
    position: relative;
}

/* Special style for days column */
.content-table td.overdue-days:not(:contains('0 days')) {
    color: #e74c3c;
    font-weight: 700;
}

/* Row hover effects */
.content-table tbody tr:hover {
    background-color: #f8f9fa;
    box-shadow: 0 3px 10px rgba(0, 0, 0, 0.05);
    transform: translateY(-1px);
}

/* Alternate row styling */
.content-table tbody tr:nth-child(even) {
    background-color: #fcfcfc;
}

/* No Data Message */
.content-table td[colspan="10"] {
    text-align: center;
    padding: 40px 15px;
    color: #7f8c8d;
    font-style: italic;
    font-size: 16px;
    background-color: #f9f9f9;
}

/* Responsive Design */
@media (max-width: 1200px) {
    .container {
        max-width: 95%;
    }
    
    .content-table {
        min-width: 900px;
    }
}

@media (max-width: 991px) {
    .col-md-8.offset-md-2 {
        width: 100%;
        margin-left: 0;
    }
}

@media (max-width: 768px) {
    .admin-heading {
        font-size: 28px;
        margin-bottom: 30px;
    }
    
    .content-table thead th,
    .content-table tbody td {
        padding: 14px 12px;
        font-size: 14px;
    }
}

/* Animation for table loading */
@keyframes fadeIn {
    from { opacity: 0; transform: translateY(10px); }
    to { opacity: 1; transform: translateY(0); }
}

.table-responsive {
    animation: fadeIn 0.5s ease-out forwards;
}

/* Custom scrollbar for table overflow */
.table-responsive::-webkit-scrollbar {
    height: 8px;
}

.table-responsive::-webkit-scrollbar-track {
    background: #f1f1f1;
    border-radius: 10px;
}

.table-responsive::-webkit-scrollbar-thumb {
    background: #c0392b;
    border-radius: 10px;
}

.table-responsive::-webkit-scrollbar-thumb:hover {
    background: #e74c3c;
}
</style>
@endsection