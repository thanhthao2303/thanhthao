<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nhân viên</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
</head>
<body>
    <div class="fixed w-[500px]  p-6 bg-[#8CE184] rounded-lg z-50 top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 hidden" id="alert">
        <div class="flex flex-col w-full">
            <h3 class="font-bold text-lg mb-4">Thông báo</h3>
            <p>Xin chào</p>
            <button id="OK-button" class="bg-[#D9D9D9] hover:bg-[#827e7e] hover:text-white font-bold py-2 px-4 rounded self-end" >OK</button>
        </div>
    </div>
    <div class= "flex flex-row">
        <div class ="bg-[#FFDA78] flex flex-col">
            <div class="flex flex-row mx-3 w-[363px] mt-4">
                <div class= "w-[120px] h-[120px] border  rounded-full">
                    <img src="https://scontent.fhan5-11.fna.fbcdn.net/v/t39.30808-6/438302850_969418811854543_7961606829111532759_n.jpg?_nc_cat=100&ccb=1-7&_nc_sid=5f2048&_nc_eui2=AeGIECmYmhEtMDjuhSZOvYiZDau9fK9PLAMNq718r08sA7py1_Sr4aEOJuP0KMYcq1SWvsfKAttVZCraxYGtu9x0&_nc_ohc=OPHrkRacku8Q7kNvgEZM4OB&_nc_ht=scontent.fhan5-11.fna&oh=00_AYAORI5lhQlRUQWcwPkEv27kyXbUhRjmWV-0t5sblfl0Fw&oe=666C6E82" alt="avatar" class="rounded-full">
                </div>
                <div class="flex flex-col items-center justify-center pl-3">
                    <h1 class="text-2xl">Phạm Xuân Trường</h1>
                </div>
            </div>
            <div class="flex flex-col px-3 my-auto">
                <button class="border p-3 mb-5 rounded-md  bg-[#D9D9D9] focus:outline-none focus:ring-2 focus:ring-black"><a href="{{route('staff.index')}}">Đơn hàng</a> </button>
                <button class="border p-3 mt-5 rounded-md  bg-[#D9D9D9] focus:outline-none focus:ring-2 focus:ring-black"><a href="{{route('evaluate.index')}}">Đánh giá</a> </button>
            </div>
        </div>
        <div class = "bg-[#2A629A] w-[90%] flex flex-col min-h-screen">
            <div class="h-[54px] flex flex-row justify-between mx-5 items-center ">
                @yield('directional')
                <div class="flex flex-row ">
                    <input type="text" class ="rounded-3xl border border-white">
                    <button>
                        <i class="bi bi-search ml-[-30px]"></i>
                    </button>
                </div>
            </div>
            <div class ="w-[96%] h-[650px] bg-[#D9D9D9] rounded-2xl  mx-auto flex flex-col">
                @yield('data')
            </div>
            @yield('button')
        </div>
        
    </div>
</body>
</html>