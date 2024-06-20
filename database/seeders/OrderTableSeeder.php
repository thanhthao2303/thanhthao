<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $orders =[[
            'Madonhang' => 'MH123',
            'Dongia' => 100000,
            'Tennguoinhan' => 'Pham Xuan Truong',
            'Sodienthoai' => '1234567890',
            'Diachi' => 'Thai Binh',
            'Thongtindonhang'=> json_encode([
                'Chua te bong dem',
                'One piece tap 1', 
                'One piece tap 2'
            ])],
            [
                'Madonhang' => 'MH234',
                'Dongia' => 200000,
                'Tennguoinhan' => 'Dang Quang Vinh',
                'Sodienthoai' => '2345678901',
                'Diachi' => 'Thai Binh',
                'Thongtindonhang'=>json_encode([
                    'One piece tap 3',
                    'One piece tap 1', 
                    'One piece tap 2'
                ])]
        ];
        DB::table('orders')->insert($orders);
    }
}
