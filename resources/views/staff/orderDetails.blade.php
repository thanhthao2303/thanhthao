@extends('staff/form')
@section('directional')
    <h1>Điều hướng </h1>
@endsection
@section('data')
    <h1>Chi tiết đơn hàng {{ $evaluate->id }}</h1>
@endsection
@section('button')
<div class="flex justify-between mx-5">
    <button id="back-button" class="px-3 py-1 border mt-2 rounded-lg"><a href="{{ route('staff.index')}}" class="">Back</a></button>
    <button id="confirm-button" class="px-3 py-1 border mt-2 rounded-lg">Xác nhận</button>
</div>
    
@endsection