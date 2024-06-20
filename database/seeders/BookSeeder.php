<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory; 

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $books = [
            [
                'tieuDe' => 'Sách hoa vẫn nở cuối ngày',
                'tacGia' => 'Nguyễn Văn A',
                'nhaXuatBan' => 'NXB Trẻ',
                'namXuatBan' => '2023',
                'ISBN' => '978-3-16-148410-0',
                'giaBan' => 150000,
                'hinhThucBia' => 'Bìa mềm',
                'tonKho' => 100,
                'soLuongDaBan' => 50,
                'moTaSach' => 'Cuốn sách này kể về những khoảnh khắc tươi đẹp và hy vọng vào cuối ngày.',
                'nhaCungCap' => 'Công ty Sách ABC',
                'soLuong' => 200,
                'trongLuong' => 500,
                'soTrang' => 300,
                'nguoiDich' => null,
                'ngonNgu' => 'Tiếng Việt',
                'theLoai' => 'Văn học'
            ],
            [
                'tieuDe' => 'Khó dỗ dành',
                'tacGia' => 'Trần Thị B',
                'nhaXuatBan' => 'NXB Công Nghệ',
                'namXuatBan' => '2024',
                'ISBN' => '978-1-23-456789-0',
                'giaBan' => 200000,
                'hinhThucBia' => 'Bìa cứng',
                'tonKho' => 80,
                'soLuongDaBan' => 20,
                'moTaSach' => 'Cuốn sách này khám phá những khó khăn trong việc an ủi và động viên người khác.',
                'nhaCungCap' => 'Công ty Sách XYZ',
                'soLuong' => 150,
                'trongLuong' => 700,
                'soTrang' => 400,
                'nguoiDich' => 'Lê Văn C',
                'ngonNgu' => 'Tiếng Việt',
                'theLoai' => 'Tâm lý học'
            ],
            [
                'tieuDe' => 'Mùa xuân ở căn nhà cũ',
                'tacGia' => 'Lê Văn D',
                'nhaXuatBan' => 'NXB Khoa Học',
                'namXuatBan' => '2022',
                'ISBN' => '978-0-12-345678-9',
                'giaBan' => 180000,
                'hinhThucBia' => 'Bìa mềm',
                'tonKho' => 50,
                'soLuongDaBan' => 30,
                'moTaSach' => 'Cuốn sách này kể về những kỷ niệm mùa xuân ở ngôi nhà cũ.',
                'nhaCungCap' => 'Công ty Sách MNO',
                'soLuong' => 120,
                'trongLuong' => 600,
                'soTrang' => 350,
                'nguoiDich' => 'Nguyễn Thị E',
                'ngonNgu' => 'Tiếng Việt',
                'theLoai' => 'Văn học'
            ],
            [
                'tieuDe' => 'Con đường dài',
                'tacGia' => 'Phạm Văn F',
                'nhaXuatBan' => 'NXB Đại Học',
                'namXuatBan' => '2021',
                'ISBN' => '978-3-16-148419-0',
                'giaBan' => 250000,
                'hinhThucBia' => 'Bìa cứng',
                'tonKho' => 70,
                'soLuongDaBan' => 40,
                'moTaSach' => 'Cuốn sách này kể về những cuộc hành trình dài đầy thử thách và khám phá.',
                'nhaCungCap' => 'Công ty Sách PQR',
                'soLuong' => 130,
                'trongLuong' => 800,
                'soTrang' => 450,
                'nguoiDich' => 'Trần Văn G',
                'ngonNgu' => 'Tiếng Việt',
                'theLoai' => 'Hồi ký'
            ],
            [
                'tieuDe' => 'Tư duy ngược',
                'tacGia' => 'Ngô Thị H',
                'nhaXuatBan' => 'NXB Kỹ Thuật',
                'namXuatBan' => '2020',
                'ISBN' => '978-0-12-345677-2',
                'giaBan' => 220000,
                'hinhThucBia' => 'Bìa mềm',
                'tonKho' => 90,
                'soLuongDaBan' => 60,
                'moTaSach' => 'Cuốn sách này hướng dẫn cách tư duy khác biệt và sáng tạo.',
                'nhaCungCap' => 'Công ty Sách STU',
                'soLuong' => 140,
                'trongLuong' => 650,
                'soTrang' => 380,
                'nguoiDich' => 'Hoàng Văn I',
                'ngonNgu' => 'Tiếng Việt',
                'theLoai' => 'Kinh doanh'
            ],
            [
                'tieuDe' => 'Hồi ức vụn vỡ',
                'tacGia' => 'Lê Thị K',
                'nhaXuatBan' => 'NXB Văn Học',
                'namXuatBan' => '2019',
                'ISBN' => '978-0-12-345679-3',
                'giaBan' => 170000,
                'hinhThucBia' => 'Bìa mềm',
                'tonKho' => 60,
                'soLuongDaBan' => 70,
                'moTaSach' => 'Cuốn sách này kể về những mảnh ký ức rời rạc và sự hồi tưởng của tác giả.',
                'nhaCungCap' => 'Công ty Sách DEF',
                'soLuong' => 100,
                'trongLuong' => 550,
                'soTrang' => 320,
                'nguoiDich' => 'Phạm Thị L',
                'ngonNgu' => 'Tiếng Việt',
                'theLoai' => 'Tự truyện'
            ]
        ];
        
         foreach ($books as $book) {
            Book::create($book);
        }
    }
}
