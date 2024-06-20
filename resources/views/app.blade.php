@extends('form')

@section('content')
    <h1>Welcome to Fahasa Bookstore!</h1>
    <a href="{{ route('admin') }}" id="Admin" class="border border-red-400">Quản lý</a>
    <a href="{{ route('staff.index') }}" id="Staff" class="border border-red-400">Nhân viên</a>
@endsection