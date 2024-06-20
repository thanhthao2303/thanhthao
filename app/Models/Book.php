<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    public $timestamps = false;
    use HasFactory;
    protected $fillable = [ 
        'tieuDe',
        'tacGia',
        'nhaXuatBan',
        'namXuatBan',
        'ISBN',
        'giaBan',
        'hinhThucBia',
        'tonKho',
        'soLuongDaBan',
        'moTaSach',
         'nhaCungCap',
         'soLuong',
         'trongLuong',
         'soTrang'  ,
         'nguoiDich',
          'ngonNgu',
          'theLoai', 
    ];
}

