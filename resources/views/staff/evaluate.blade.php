@extends('staff/form')

@section('directional')
  <h1>Điều hướng</h1>
@endsection

@section('data')
<h1 class="text-3xl mx-auto mt-4">Đánh giá đơn hàng</h1>
<div class="mt-10 mx-auto w-[98%]">
    <table class="w-full">
        <thead>
            <tr class="flex justify-between mb-5 border-b-4 border-b-black">
              <th scope="col">Mã đơn hàng</th>
              <th scope="col">Nội dung</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($evaluates as $evaluate)
              <tr class= "flex justify-between mt-2 bg-[#FFFFFF] p-2 rounded-md items-center" href="{{ route('evaluate.show', 2) }}">
                <th scope="col">{{$evaluate->Madonhang}}</th>
                <th scope="col">{{$evaluate->Tennguoinhan}}</th>
              </tr>
            
                
            @endforeach
        </tbody>
    </table>
</div>
@endsection

@section('button')
<div class="flex justify-between mx-5">
  <button id="back-button" class="px-3 py-1 border mt-2 rounded-lg"><a href="{{ route('staff.index')}}" class="">Back</a></button>
</div>
@endsection
