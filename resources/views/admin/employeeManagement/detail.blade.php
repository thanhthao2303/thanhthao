<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý nhân viên</title>
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
            display: flex;
            align-items: center;
        }

        .sidebar a:hover {
            text-decoration: underline;
        }

        .content {
            flex-grow: 1;
            padding: 15px;
            background-color: #9EA5AB;
            display: flex;
            justify-content: center;
            align-items: center;
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
            width: 100%;
            padding-left: 0;
            padding-right: 0;
            margin-right: 0;
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

        .employee-detail-container {
            width: 650px;
            padding: 30px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border: 0.5px solid black;
        }

        .employee-detail-container h1 {
            font-size: 24px;
            margin-bottom: 20px;
            text-align: left;
            color: #333;
        }

        .employee-detail-container .detail-item {
            display: flex;
            margin: 20px 0;
            font-size: 16px;
            color: #000;
        }

        .employee-detail-container .detail-item strong {
            width: 150px;
            color: #555;
            flex-shrink: 0;
        }

        .employee-detail-container .detail-item span {
            flex-grow: 1;
        }

        .employee-detail-container .rating {
            margin-top: 20px;
        }

        .btn-back {
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

        .btn-back:hover {
            background-color: #bfbfbf;
        }

        .sidebar svg {
            margin-right: 10px;
        }
    </style>
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
                    <a href="{{ route('employees.index') }}" class="arrow-button" style="width: 100%;padding-left: 0px;padding-right: 0px;margin-right: 0px;">
                        <span class="icon" style="margin-right: 5px;margin-left: 10px;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" fill="currentColor" class="bi bi-people" viewBox="0 0 16 16">
                                <path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1zm-7.978-1L7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002-.014.002zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4m3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0M6.936 9.28a6 6 0 0 0-1.23-.247A7 7 0 0 0 5 9c-4 0-5 3-5 4q0 1 1 1h4.216A2.24 2.24 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816M4.92 10A5.5 5.5 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275ZM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0m3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4" />
                            </svg>
                        </span>Quản lý nhân viên
                    </a>
                </li>
                <li class="no-underline" style="margin-top: 23px;margin-bottom: 23px;">
                    <a href="#" style="margin-left: 10px;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" fill="currentColor" class="bi bi-bookshelf" viewBox="0 0 16 16">
                            <path d="M2.5 0a.5.5 0 0 1 .5.5V2h10V.5a.5.5 0 0 1 1 0v15a.5.5 0 0 1-1 0V15H3v.5a.5.5 0 0 1-1 0V.5a.5.5 0 0 1 .5-.5M3 14h10v-3H3zm0-4h10V7H3zm0-4h10V3H3z" />
                        </svg><span style="margin-left: 7px;">Quản lý sách</span>
                    </a>
                </li>
                <li class="no-underline">
                    <a href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16" style="margin-left: 12px;margin-top: 2px;">
                            <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0z"></path>
                            <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708z"></path>
                        </svg><span style="margin-left: 4px;">Đăng xuất</span>
                    </a>
                </li>
            </ul>
        </div>
        <div class="content">
            <div class="employee-detail-container">
                <h1>{{ $employee->hoTen }}</h1>
                <div class="detail-item">
                    <strong>Ngày sinh:</strong><span>{{ \Carbon\Carbon::parse($employee->ngaySinh)->format('d - m - Y') }}</span>
                </div>
                <div class="detail-item">
                    <strong>Địa chỉ:</strong><span>{{ $employee->diaChi }}</span>
                </div>
                <div class="detail-item">
                    <strong>Số điện thoại:</strong><span>{{ $employee->soDienThoai }}</span>
                </div>
                <div class="detail-item">
                    <strong>Email:</strong><span>{{ $employee->email }}</span>
                </div>
                <div class="detail-item">
                    <strong>Chức vụ:</strong><span>{{ $employee->chucVu }}</span>
                </div>
                <div class="detail-item">
                    <strong>Ngày bắt đầu:</strong><span>{{ \Carbon\Carbon::parse($employee->ngayBatDauLamViec)->format('d - m - Y') }}</span>
                </div>
                <div class="detail-item">
                    <strong>Mức lương:</strong><span>{{ number_format($employee->mucLuong, 0, ',', '.') }} /tháng</span>
                </div>
                <div class="detail-item rating">
                    <strong>Đánh giá:</strong><span>{{ $employee->danhGia }}</span>
                </div>
                <a href="{{ route('employees.index') }}" class="btn-back" style="border: 1px solid #888888; margin-top: 20px;">Quay lại</a>
            </div>
        </div>
    </div>
</body>
</html>