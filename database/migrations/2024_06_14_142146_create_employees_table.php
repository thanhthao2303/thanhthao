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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('hoTen');
            $table->date('ngaySinh');
            $table->string('diaChi');
            $table->string('soDienThoai', 10);
            $table->string('email')->unique();
            $table->string('chucVu');
            $table->date('ngayBatDauLamViec');
            $table->decimal('mucLuong', 15, 2);
            $table->text('danhGia')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
};
