<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cập nhật thông tin sách</title>
    <link rel="stylesheet" href="{{ asset('resources/css/indexEmployee.css') }}">
    <style>
        body {
            margin: 0;
            font-family: sans-serif;
        }

        .container {
            display: flex;
            height: 100%;
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

        .sidebar svg {
            margin-right: 10px;
        }

        .content {
            flex-grow: 1;
            padding: 15px;
            background-color: #9EA5AB;
            display: flex;
            align-items: center;
            justify-content: center;
            max-width: 82.9%;
            max-height: 90%;
            margin: auto;
            position: relative; /* Add this */
        }

        .book-form-container {
            background-color: #fff;
            width: 94.5%;
            height: 90%;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border: 0.5px solid black;
        }

        .book-form-container h1 {
            font-size: 24px;
            margin-bottom: 20px;
            text-align: center;
            color: #333;
        }

        .book-form-container .form-item {
            display: flex;
            flex-direction: column;
            margin-bottom: 15px;
            font-size: 16px;
            width: 32%;
        }

        .book-form-container .form-item label {
            color: #555;
            width: 150px;
            margin-bottom: 5px;
        }

        .book-form-container .form-item input,
        .book-form-container .form-item textarea {
            width: calc(100% - 80px);
            padding: 10px;
            font-size: 14px;
            border: 1px solid #ccc;
            border-radius: 4px;
            background-color: #ECF7FC;
        }

        .book-form-container .form-item textarea {
            resize: vertical;
        }

        .book-form-container .form-buttons {
            display: flex;
            justify-content: flex-end;
            gap: 20px;
        }

        .book-form-container .form-buttons button {
            padding: 10px 20px;
            font-size: 16px;
            color: #333;
            background-color: #d3d3d3;
            border: 1px solid #ccc;
            border-radius: 20px;
            cursor: pointer;
        }

        .book-form-container .form-buttons button:hover {
            background-color: #bfbfbf;
        }

        .book-form-container .form-buttons .btn-save {
            border-radius: 30px;
            border: 1px solid #000;
            background: #B9B6B6;
            color: black;
        }

        .book-form-container .form-buttons .btn-save:hover {
            background-color: #1e5f8e;
        }

        .book-form-container .form-buttons .btn-cancel {
            background-color: #D9D9D9;
            color: black;
        }

        .book-form-container .form-buttons .btn-cancel:hover {
            background-color: #b5b5b5;
        }

        .book-image {
            text-align: center;
            margin-bottom: 20px;
        }

        .book-image img {
            width: 150px;
            height: auto;
            margin-bottom: 10px;
        }

        .form-group {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        .description-group {
            width: 100%;
        }

        .btn-cancel {
            display: inline-block;
            padding: 10px 20px;
            font-size: 16px;
            color: #333;
            background-color: #d3d3d3;
            border: 1px solid #ccc;
            border-radius: 20px;
            text-decoration: none;
            text-align: right;
        }

        .btn-cancel:hover {
            background-color: #bfbfbf;
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

        .no-underline a {
            text-decoration: none !important;
        }

        .no-underline a:hover {
            text-decoration: none !important;
        }

        .notification {
            display: none;
            align-items: center;
            justify-content: center;  
            background-color: #e6ffe6;
            color: #4CAF50;
            border: 1px solid #4CAF50;
            padding: 10px;
            border-radius: 5px;
            max-width: 298px;
            position: fixed; /* Use fixed positioning */
            top: 50%; /* Center vertically */
            left: 50%; /* Center horizontally */
            transform: translate(-50%, -50%); /* Offset by 50% to truly center */
            z-index: 1000; /* Ensure it appears above other elements */
        }

        .notification .icon {
            font-size: 20px;
            margin-right: 10px;
        }

        .error-message {
            color: red;
            font-size: 12px;
            margin-top: 5px;
        }
        
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
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
                    <a href="{{ route('books.index') }}">
                        <span class="icon" style="margin-right: 5px; margin-left: 10px;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" fill="currentColor" class="bi bi-people" viewBox="0 0 16 16">
                                <path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1zm-7.978-1L7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002-.014.002zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4m3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0M6.936 9.28a6 6 0 0 0-1.23-.247A7 7 0 0 0 5 9c-4 0-5 3-5 4q0 1 1 1h4.216A2.24 2.24 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816M4.92 10A5.5 5.5 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275ZM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0m3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4" />
                                </svg> </span>Quản lý nhân viên
                    </a>
                </li>
                <li class="no-underline" style="margin-top: 23px; margin-bottom: 23px;">
                    <a href="{{ route('books.index') }}" class="arrow-button" style="width: 100%; padding-left: 0px; padding-right: 0px; margin-right: 0px;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" fill="currentColor" class="bi bi-bookshelf" viewBox="0 0 16 16">
                            <path d="M2.5 0a.5.5 0 0 1 .5.5V2h10V.5a.5.5 0 0 1 1 0v15a.5.5 0 0 1-1 0V15H3v.5a.5.5 0 0 1-1 0V.5a.5.5 0 0 1 .5-.5M3 14h10v-3H3zm0-4h10V7H3zm0-4h10V3H3z" />
                        </svg><span style="margin-left: 7px;">Quản lý sách</span>
                    </a>
                </li>
                <li class="no-underline">
                    <a href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16" style="margin-left: 12px; margin-top: 2px;">
                            <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0z"></path>
                            <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708z"></path>
                        </svg><span style="margin-left: 4px;">Đăng xuất</span>
                    </a>
                </li>
            </ul>
        </div>
        <div class="content">
            <div class="book-form-container">
                <div class="header-container">
                    <h1>Cập nhật thông tin sách</h1>
                    <div class="book-image">
                        <!-- <img src="path_to_book_image.jpg" alt="Book Image"> -->
                        <p>ID: 8935210306244</p>
                    </div>
                    @if(session('success'))
                    <div class="notification" id="notification">
                        <i class="fas fa-check-circle icon"></i>
                        <span>{{ session('success') }}</span>
                    </div>
                    @endif
                </div>
                <form action="{{ route('books.update', $book->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <div class="form-item">
                            <label for="tieuDe">Tiêu đề:</label>
                            <input type="text" id="tieuDe" name="tieuDe" value="{{ old('tieuDe', $book->tieuDe) }}">
                            @error('tieuDe')
                            <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-item">
                            <label for="tacGia">Tác giả:</label>
                            <input type="text" id="tacGia" name="tacGia" value="{{ old('tacGia', $book->tacGia) }}">
                            @error('tacGia')
                            <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-item">
                            <label for="nhaXuatBan">Nhà xuất bản:</label>
                            <input type="text" id="nhaXuatBan" name="nhaXuatBan" value="{{ old('nhaXuatBan', $book->nhaXuatBan) }}">
                            @error('nhaXuatBan')
                            <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-item">
                            <label for="namXuatBan">Năm xuất bản:</label>
                            <input type="text" id="namXuatBan" name="namXuatBan" value="{{ old('namXuatBan', $book->namXuatBan) }}">
                            @error('namXuatBan')
                            <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-item">
                            <label for="ISBN">ISBN:</label>
                            <input type="text" id="ISBN" name="ISBN" value="{{ old('ISBN', $book->ISBN) }}">
                            @error('ISBN')
                            <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-item">
                            <label for="nhaCungCap">Nhà cung cấp:</label>
                            <input type="text" id="nhaCungCap" name="nhaCungCap" value="{{ old('nhaCungCap', $book->nhaCungCap) }}">
                            @error('nhaCungCap')
                            <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-item">
                            <label for="hinhThucBia">Hình thức bìa:</label>
                            <input type="text" id="hinhThucBia" name="hinhThucBia" value="{{ old('hinhThucBia', $book->hinhThucBia) }}">
                            @error('hinhThucBia')
                            <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-item">
                            <label for="soLuong">Số lượng:</label>
                            <input type="text" id="soLuong" name="soLuong" value="{{ old('soLuong', $book->soLuong) }}">
                            @error('soLuong')
                            <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-item">
                            <label for="soTrang">Số trang:</label>
                            <input type="text" id="soTrang" name="soTrang" value="{{ old('soTrang', $book->soTrang) }}">
                            @error('soTrang')
                            <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-item">
                            <label for="trongLuong">Trọng lượng:</label>
                            <input type="text" id="trongLuong" name="trongLuong" value="{{ old('trongLuong', $book->trongLuong) }}">
                            @error('trongLuong')
                            <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-item">
                            <label for="nguoiDich">Người dịch:</label>
                            <input type="text" id="nguoiDich" name="nguoiDich" value="{{ old('nguoiDich', $book->nguoiDich) }}">
                            @error('nguoiDich')
                            <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-item">
                            <label for="ngonNgu">Ngôn ngữ:</label>
                            <input type="text" id="ngonNgu" name="ngonNgu" value="{{ old('ngonNgu', $book->ngonNgu) }}">
                            @error('ngonNgu')
                            <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-item">
                            <label for="giaBan">Giá bán:</label>
                            <input type="text" id="giaBan" name="giaBan" value="{{ old('giaBan', $book->giaBan) }}">
                            @error('giaBan')
                            <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-item">
                            <label for="tonKho">Tồn kho:</label>
                            <input type="text" id="tonKho" name="tonKho" value="{{ old('tonKho', $book->tonKho) }}">
                            @error('tonKho')
                            <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-item">
                            <label for="soLuongDaBan">Số lượng đã bán:</label>
                            <input type="text" id="soLuongDaBan" name="soLuongDaBan" value="{{ old('soLuongDaBan', $book->soLuongDaBan) }}">
                            @error('soLuongDaBan')
                            <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-item">
                            <label for="theLoai">Thể loại:</label>
                            <input type="text" id="theLoai" name="theLoai" value="{{ old('theLoai', $book->theLoai) }}">
                            @error('theLoai')
                            <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-item description-group" style="width: 100%; display: flex;">
                            <label for="moTaSach" style="width: 87px; text-align: right; margin-right: 10px;">Mô tả sách:</label>
                            <input type="text" id="moTaSach" name="moTaSach" style="width: calc(100% - 80px); height: 50px;" value="{{ old('moTaSach', $book->moTaSach) }}">
                            @error('moTaSach')
                            <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-buttons" style="display: flex; justify-content: flex-end; gap: 20px; margin-top: 10px; width: 100%;">
                            <button type="submit" class="btn-save">Lưu lại</button>
                            <a href="{{ route('books.index') }}" class="btn-cancel">Quay lại</a>
                        </div>
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
                }, 5000); // Thông báo sẽ biến mất sau 5 giây
            }
        });
    </script>
</body>

</html>
