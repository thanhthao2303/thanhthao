<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('tieuDe');
            $table->string('tacGia');
            $table->string('nhaXuatBan');
            $table->year('namXuatBan');  
            $table->string('ISBN')->unique();
            $table->decimal('giaBan', 8, 2);  
            $table->string('hinhThucBia');
            $table->integer('tonKho');  
            $table->integer('soLuongDaBan');  
            $table->text('moTaSach')->nullable();
            $table->string('nhaCungCap');
            $table->integer('soLuong');  
            $table->decimal('trongLuong', 8, 2);  
            $table->integer('soTrang');   
            $table->string('nguoiDich')->nullable(); 
            $table->string('ngonNgu');
            $table->string('theLoai');
         });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books');
    }
};
