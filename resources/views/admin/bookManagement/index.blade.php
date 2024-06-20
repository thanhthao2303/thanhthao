<!DOCTYPE html>
<html>

<head>
    <title>Quản lý sách</title>
    <link rel="stylesheet" href="{{ asset('resources/css/indexEmployee.css') }}">
    <style>
        body {
            margin: 0;
            font-family: sans-serif;
        }

        .container {
            display: flex;
            height: 100vh;
        }

        .sidebar {
            background-color: #484D51;
            color: #fff;
            width: 200px;
            padding: 20px;
        }

        .sidebar h1 {
            margin-top: 0;
        }

        .sidebar ul {
            list-style: none;
            padding: 0;
        }

        .sidebar li {
            margin-bottom: 10px;
        }

        .sidebar a {
            color: #fff;
            text-decoration: none;
        }

        .sidebar a:hover {
            text-decoration: underline;
        }

        .content {
            flex-grow: 1;
            padding: 15px;
            background-color: #9EA5AB;
        }

        .content h1 {
            margin-top: 0;
        }

        .content table {
            width: 100%;
            border-collapse: collapse;
        }

        .content th,
        .content td {
            border: 1px solid #888888;
            padding: 10px;
            text-align: center;
        }

        .sidebar img {
            width: 100%;
            height: auto;
            margin-bottom: 20px;
        }

        .arrow-button {
            display: inline-flex;
            align-items: center;
            background-color: #297abf;
            color: white;
            padding: 10px 20px;
            font-size: 16px;
            font-family: Arial, sans-serif;
            border: none;
            border-radius: 0;
            position: relative;
            cursor: pointer;
            margin-right: 50px;
            /* Adjust space for arrow */
        }

        .arrow-button::after {
            content: '';
            position: absolute;
            right: 0px;
            top: 0;
            bottom: 0;
            width: 0;
            height: 0;
            border-right: 12px solid #9EA5AB;
            border-top: 20px solid transparent;
            border-bottom: 23px solid transparent;
        }

        .arrow-button .icon {
            margin-right: 10px;
        }

        .no-underline a {
            text-decoration: none !important;
        }

        .no-underline a:hover {
            text-decoration: none !important;
        }

        .search-box {
            display: flex;
            align-items: center;
            border: 1px solid #000;
            border-radius: 30px;
            padding: 5px 10px;
            width: 100%;
            max-width: 400px;
            background: #eee;
        }

        .search-box input {
            border: none;
            outline: none;
            background: none;
            padding: 5px 10px;
            flex-grow: 1;
            font-size: 16px;
        }

        .search-box input::placeholder {
            color: #aaa;
        }

        .search-box button {
            background: none;
            border: none;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .search-box svg {
            fill: #000;
        }

        .btn {
            display: inline-block;
            padding: 10px 20px;
            font-size: 16px;
            color: black;
            background-color: #ddd;
            border: 1px solid #ccc;
            border-radius: 25px;
            text-decoration: none;
            text-align: center;
        }

        .container1 {
            display: flex;
            align-items: center;
        }

        .icon-links a {
            text-decoration: none;
            margin-right: 20px;
            /* Increased spacing */
        }

        .icon-links a:last-child {
            margin-right: 0;
            /* No margin for the last icon */
        }

        .notification {
            display: none;
            align-items: center;
            background-color: #e6ffe6;
            color: #4CAF50;
            border: 1px solid #4CAF50;
            padding: 10px;
            border-radius: 5px;
            max-width: 298px;
            margin-left: auto;
            margin-right: 0;
        }

        .notification .icon {
            font-size: 20px;
            margin-right: 10px;
        }

        .header-container {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgb(0, 0, 0);
            background-color: rgba(0, 0, 0, 0.4);
            padding-top: 60px;
        }

        .modal-content {
            background-color: #fefefe;
            margin: 5% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 400px;
            border-radius: 10px;
            position: relative;
        }

        .modal-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding-bottom: 10px;
            border-bottom: 1px solid #ddd;
        }

        .modal-header h2 {
            margin: 0;
            font-size: 16px;
        }

        .modal-header .close {
            color: #aaa;
            font-size: 24px;
            font-weight: bold;
            cursor: pointer;
        }

        .modal-header .close:hover,
        .modal-header .close:focus {
            color: black;
        }

        .modal-body {
            margin: 20px 0;
            text-align: left;
        }

        .modal-body p {
            margin: 10px 0;
            font-size: 14px;
        }

        .modal-footer {
            display: flex;
            justify-content: flex-end;
            gap: 10px;
        }

        .modal-footer button {
            padding: 8px 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
        }

        .modal-footer .confirm {
            background-color: #4CAF50;
            color: white;
        }

        .modal-footer .cancel {
            background-color: #D2D2D2;
            color: white;
        }

        .warning-icon {
            width: 24px;
            height: 24px;
            margin-right: 10px;
        }

        .modal-header .title-container {
            display: flex;
            align-items: center;
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>
    <div class="container">
        <div class="sidebar" style="padding-left:0px; padding-right:0px">
            <div class="svg-container" style="text-align: center;">
                <svg xmlns="http://www.w3.org/2000/svg" width="55" height="55" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                    <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
                </svg>
                <h2 style="margin-top: 0px; margin-bottom: 0px">Quản lý</h2>
            </div>
            <ul style="margin-top: 50px;">
                <li class="no-underline">
                    <a href="{{ route('employees.index') }}"  >
                        <span class="icon" style="margin-right: 5px;margin-left: 10px;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" fill="currentColor" class="bi bi-people" viewBox="0 0 16 16">
                                <path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1zm-7.978-1L7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002-.014.002zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4m3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0M6.936 9.28a6 6 0 0 0-1.23-.247A7 7 0 0 0 5 9c-4 0-5 3-5 4q0 1 1 1h4.216A2.24 2.24 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816M4.92 10A5.5 5.5 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275ZM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0m3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4" />
                            </svg>
                        </span>Quản lý nhân viên
                        <li class="no-underline" style="margin-top: 23px;margin-bottom: 23px;">
                    <a href="{{ route('books.index') }}" class="arrow-button" style="width: 100%;padding-left: 0px;padding-right: 0px;margin-right: 0px;">
                        <span class="icon" style="margin-right: 5px;margin-left: 10px;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" fill="currentColor" class="bi bi-bookshelf" viewBox="0 0 16 16">
                                <path d="M2.5 0a.5.5 0 0 1 .5.5V2h10V.5a.5.5 0 0 1 1 0v15a.5.5 0 0 1-1 0V15H3v.5a.5.5 0 0 1-1 0V.5a.5.5 0 0 1 .5-.5M3 14h10v-3H3zm0-4h10V7H3zm0-4h10V3H3z" />
                            </svg>
                        </span>Quản lý sách


                 </a>
                </li>
                <li class="no-underline">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16" style="margin-left: 12px;margin-top: 2px;">
                        <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0z"></path>
                        <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708z"></path>
                    </svg><a href="#" style="margin-left: 4px;">Đăng xuất</a>
                </li>
            </ul>
        </div>
        <div class="content">
            <div style="background-color: #fff; width:100%; height: 100%; border: 0.5px solid black">
                <div class="header-container">
                    <h1 style="margin-top:25px; margin-bottom:0px; margin-left:40%">Danh sách sách</h1>
                    @if(session('success'))
                    <div class="notification" id="notification" style="margin-right:10px; margin-top:5px">
                        <i class="fas fa-check-circle icon"></i>
                        <span>{{ session('success') }}</span>
                    </div>
                    @endif
                </div>
                <div class="container1">
    <!-- Biểu tượng menu -->
    <div style="margin-top: 30px; margin-left: 340px;">
        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M3.5 12.5a.5.5 0 0 1 0-1h9a.5.5 0 0 1 0 1h-9zm0-5a.5.5 0 0 1 0-1h9a.5.5 0 0 1 0 1h-9zm0-5a.5.5 0 0 1 0-1h9a.5.5 0 0 1 0 1h-9z"/>
        </svg>
    </div>
    <!-- Thanh tìm kiếm -->
    <div class="search-box" style="margin-top: 30px; margin-left: 10px;">
        <input type="text" id="search" placeholder="Nhập nội dung sách cần tìm">
        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="20" class="bi bi-search search-icon" viewBox="0 0 16 16">
            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />
        </svg>
    </div>
    <a href="{{ route('books.create') }}" class="btn" style="margin-top: 30px; margin-left: 130px; border: 1px solid #888888">+ Thêm sách</a>
</div>


                <div class="table-container" style="margin-top:15px">
                    <table>
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tiêu đề</th>
                                <th>Tác giả</th>
                                <th>Thể loại</th>
                                <th>Giá bán</th>
                                <th>Tồn kho</th>
                                <th>Hoạt động</th>
                            </tr>
                        </thead>
                        <tbody id="bookTableBody">
                            @foreach($books as $index => $book)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $book->tieuDe }}</td>
                                <td>{{ $book->tacGia }}</td>
                                <td>{{ $book->theLoai }}</td>
                                <td>{{ $book->giaBan }}</td>
                                <td>{{ $book->tonKho }}</td>

                                <td class="icon-links">
                                    <a href="{{ route('books.show', $book->id) }}"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#009900" class="bi bi-eye" viewBox="0 0 16 16">
                                            <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13 13 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5s3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5s-3.879-1.168-5.168-2.457A13 13 0 0 1 1.172 8z" />
                                            <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0" />
                                        </svg>
                                    </a>
                                    <a href="{{ route('books.edit', $book->id) }}"><svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="#330099" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z" />
                                        </svg>
                                    </a>
                                    <a href="#" class="delete-btn" data-book="{{ $book->title }}" data-id="{{ $book->id }}">
    <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="#BB0000" class="bi bi-trash" viewBox="0 0 16 16">
        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z" />
        <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z" />
    </svg>
</a>

                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
   <!-- Modal -->
   <div id="myModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <div class="title-container">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-exclamation-triangle" viewBox="0 0 16 16">
                        <path d="M7.938 2.016A.13.13 0 0 1 8.002 2a.13.13 0 0 1 .063.016.15.15 0 0 1 .054.057l6.857 11.667c.036.06.035.124.002.183a.2.2 0 0 1-.054.06.1.1 0 0 1-.066.017H1.146a.1.1 0 0 1-.066-.017.2.2 0 0 1-.054-.06.18.18 0 0 1 .002-.183L7.884 2.073a.15.15 0 0 1 .054-.057m1.044-.45a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767z" />
                        <path d="M7.002 12a1 1 0 1 1 2 0 1 1 0 0 1-2 0M7.1 5.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0z" />
                    </svg>
                    <h2 style="margin-left:10px">Xóa thông tin nhân viên</h2>
                </div>
                <span class="close">&times;</span>
            </div>
            <div class="modal-body">
                <p id="deleteMessage">Bạn có chắc chắn muốn xóa thông tin nhân viên không?</p>
            </div>
            <div class="modal-footer">
                <form id="deleteForm" method="POST" action="{{ route('books.destroy', $book->id) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="confirm">Đồng ý</button>
                    <button type="button" class="cancel">Hủy</button>
                </form>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', (event) => {
            const notification = document.getElementById('notification');
            if (notification) {
                notification.style.display = 'flex';
                setTimeout(() => {
                    notification.style.display = 'none';
                }, 5000);
            }

            var modal = document.getElementById("myModal");
            var span = document.getElementsByClassName("close")[0];
            var cancelBtn = document.getElementsByClassName("cancel")[0];
            var deleteButtons = document.querySelectorAll('.delete-btn');

            deleteButtons.forEach(button => {
                button.addEventListener('click', function(event) {
                    event.preventDefault();
                    var bookName = this.getAttribute('data-book');
                    var bookId = this.getAttribute('data-id');
                    document.getElementById('deleteMessage').textContent = `Bạn có chắc chắn muốn xóa thông tin nhân viên ${bookName} không?`;
                    document.getElementById('deleteForm').action = `/books/${bookId}`;
                    modal.style.display = "block";
                });
            });

            span.onclick = function() {
                modal.style.display = "none";
            }

            cancelBtn.onclick = function() {
                modal.style.display = "none";
            }

            window.onclick = function(event) {
                if (event.target == modal) {
                    modal.style.display = "none";
                }
            }


            // Search functionality
            const searchInput = document.getElementById('search');
            searchInput.addEventListener('input', function() {
                const searchValue = this.value;

                fetch(`/books/search?search=${searchValue}`, {
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        const tbody = document.getElementById('bookTableBody');
                        tbody.innerHTML = '';
                        data.books.forEach((book, index) => {
                            const tr = document.createElement('tr');
                            tr.innerHTML = `
                        <td>${index + 1}</td>
                        <td>${book.tieuDe}</td>
                        <td>${book.tacGia}</td>
                        <td>${book.theLoai}</td>
                        <td>${book.giaBan}</td>
                        <td>${book.tonKho}</td>
                        <td class="icon-links">
                            <a href="/books/${book.id}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#009900" class="bi bi-eye" viewBox="0 0 16 16">
                                    <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13 13 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5s3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5s-3.879-1.168-5.168-2.457A13 13 0 0 1 1.172 8z" />
                                    <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0" />
                                </svg>
                            </a>
                            <a href="/books/${book.id}/edit">
                                <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="#330099" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z" />
                                </svg>
                            </a>
                            <a href="#" class="delete-btn" data-book="${book.hoTen}" data-id="${book.id}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="#BB0000" class="bi bi-trash" viewBox="0 0 16 16">
                                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z" />
                                    <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z" />
                                </svg>
                            </a>
                        </td>
                    `;
                            tbody.appendChild(tr);
                        });
                    });
            });
        });

    </script>
</body>

</html>