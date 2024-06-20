<?php

namespace Database\Seeders;

use App\Models\Employee;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory;

class EmployeeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $employees = [
            [
                'hoTen' => 'Nguyễn Văn An',
                'ngaySinh' => '2003-04-01',
                'diaChi' => 'Hà Nội',
                'soDienThoai' => '0301234567',
                'email' => 'nguyenvanan@example.com',
                'chucVu' => 'Nhân viên chăm sóc khách hàng',
                'ngayBatDauLamViec' => '2024-04-01',
                'mucLuong' => 3000000,
                'danhGia' => 'Đã hoàn thành khá tốt vai trò của mình trong vị trí nhân viên chăm sóc khách hàng trong suốt thời gian qua. 
                Nên tiếp tục trau dồi kỹ năng chuyên môn và kiến thức để có thể hoàn thành tốt công việc trong thời gian sắp tới',
            ],
            [
                'hoTen' => 'Trần Thị Bình',
                'ngaySinh' => '2005-10-05',
                'diaChi' => 'Hưng Yên',
                'soDienThoai' => '0302345678',
                'email' => 'tranthib@example.com',
                'chucVu' => 'Nhân viên chăm sóc khách hàng',
                'ngayBatDauLamViec' => '2023-11-15',
                'mucLuong' => 4000000,
                'danhGia' => 'Hoàn thành tốt công việc',
            ],
        ];

        foreach ($employees as $employee) {
            Employee::create($employee);
        }
    }
}
