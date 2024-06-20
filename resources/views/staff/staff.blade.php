@extends('staff/form')

@section('directional')
    <div class="rounded-3xl flex flex-row bg-[#D9D9D9]">
        <i class="bi bi-house-door-fill text-2xl mx-3"></i>
    </div>
@endsection


@section('data')
    <h1 class="text-3xl mx-auto mt-4">Danh sách đơn hàng</h1>
    <div class="mt-10 mx-auto w-[98%]">
        <table class="w-full">
            <thead>
                <tr class="flex justify-between mb-5 border-b-4 border-b-black">
                    <th scope="col">Mã đơn hàng</th>
                    <th scope="col">Đơn giá</th>
                    <th scope="col">Địa chỉ</th>
                    <th scope="col">Thao tác</th>
                </tr>
            </thead>
            <tbody>
                @foreach($evaluates as $evaluate)
                <tr class= "flex justify-between mt-2 bg-[#FFFFFF] p-2 rounded-md items-center" href="{{ route('staff.show', $evaluate->id) }}">
                    <th scope="col">{{$evaluate->Madonhang}}</th>
                    <th scope="col">{{$evaluate->Dongia}}</th>
                    <th scope="col">{{$evaluate->Diachi}}</th>
                    <th scope="col">
                        <a class="flex bg-green-700 rounded-xl hover:bg-green-800 hover:text-white p-2" href="{{ route('staff.show', $evaluate->id) }}">
                            <i class="bi bi-eye-fill"></i>
                        </a>                
                    </th>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
