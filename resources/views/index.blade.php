@extends('admin.default')

@section('title')
    Trang chủ
    @parent

@stop

@section('header_styles')
    <style>
        /* .book-container {
                                    display: flex;
                                    flex-wrap: wrap;
                                    gap: 20px;
                                } */

        .book-card {
            background-color: #f9f9f9;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            width: 300px;
            transform: scale(0.95);
            transition: transform 0.3s ease-in-out;
        }

        .book-card:hover {
            transform: scale(1);
        }

        .book-image img {
            width: 100%;
            height: auto;
        }

        .book-details {
            padding: 20px;
        }

        .book-details h2 {
            margin-top: 0;
        }

        .actions {
            display: flex;
            gap: 10px;
            margin-top: 10px;
            /* align-items: center;
                                        justify-content: center; */
        }

        .btn {
            background-color: #007bff;
            border: none;
            color: white;
            padding: 8px 16px;
            text-align: center;
            text-decoration: none;
            font-size: 16px;
            border-radius: 4px;
            cursor: pointer;
        }

        .btn:hover {
            background-color: #0056b3;
        }

        .btn-danger {
            background-color: #dc3545;
        }

        .btn-warning {
            background-color: #ffc107;
        }

        .pagination {
            margin-top: 20px;
            /* text-align: center; */
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .pagination-link {
            padding: 6px 12px;
            margin: 0 2px;
            border: 1px solid #ddd;
            border-radius: 3px;
            color: #007bff;
            text-decoration: none;
        }

        .pagination-link:hover {
            background-color: #f2f2f2;
        }

        .current-page {
            background-color: #dc3545;
            color: #fff;
            border-color: #dc3545;
        }
    </style>

@stop

@section('content')
    <!-- Nội dung trang -->
    <div class="" style="margin: auto">
        <div class="book-container container">
            @if ($list_books)
                <div class="row">
                    @foreach ($list_books as $item)
                        <div class="col-sm-3" style="height: 580px">
                            <div class="book-card">
                                <div class="book-image">
                                    <img src="{{ asset($item->URL) }}" alt="{{ $item['TenSach'] }}"
                                        style="height: 380px; object-fit: cover">
                                </div>
                                <div class="book-details">
                                    <h4><strong>{{ $item['TenSach'] }}</strong></h4>
                                    <p><strong>Tác giả:</strong> {{ $item['TacGia'] }}</p>
                                    <p><strong>Giá:</strong> {{ $item['Gia'] }}</p>
                                    <div class="actions">
                                        @if ($admin)
                                            <a href="{{ route('delete', ['id' => $item['id']]) }}"
                                                class="btn btn-danger">Xóa</a>
                                            {{-- <a href="{{ route('edit', ['id' => $item['id']]) }}" class="btn btn-info">Chỉnh
                                                sửa</a> --}}
                                            <a href="{{ route('store', ['id' => $item['id']]) }}" class="btn btn-info">Chỉnh
                                                sửa</a>
                                        @endif
                                        <a href="{{ route('detail', ['id' => $item['id']]) }}" class="btn btn-warning">chi
                                            tiết</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <!-- Hiển thị liên kết phân trang -->
                <div class="pagination">
                    @if ($list_books->previousPageUrl())
                        <a href="{{ $list_books->previousPageUrl() }}" class="pagination-link">Trước</a> |
                    @endif
                    @for ($i = 1; $i <= $list_books->lastPage(); $i++)
                        @if ($i == $list_books->currentPage())
                            <span class="pagination-link current-page">{{ $i }}</span>
                        @else
                            <a href="{{ $list_books->url($i) }}" class="pagination-link">{{ $i }}</a>
                        @endif
                        @if ($i < $list_books->lastPage())
                            |
                        @endif
                    @endfor
                    @if ($list_books->nextPageUrl())
                        | <a href="{{ $list_books->nextPageUrl() }}" class="pagination-link">Tiếp</a>
                    @endif
                </div>
            @else
                <h1>Không có thể loại nào</h1>
            @endif



        </div>


    </div>
@stop

@section('footer_scripts')
    {{-- <script src="https://cdn.tailwindcss.com"></script> --}}
    <!-- Thêm các tài nguyên JavaScript của bạn tại đây -->
    <script type="text/javascript"></script>
@stop
