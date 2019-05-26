<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNhanVienTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       if (Schema::hasTable('nhan_vien')) {
            down('nhan_vien');
       }
        Schema::create('nhan_vien', function (Blueprint $table) {
            $table->char('manv',10)->primary();
            // $table->primary('manv');
            $table->string('ten');
            $table->boolean('gioi_tinh');
            $table->string('email');
            $table->string('mat_khau');
            $table->string('so_dien_thoai',10)->nullable();
            $table->string('ngay_sinh')->nullable();
            $table->string('dia_chi')->nullable();
            $table->char('so_chung_minh',12);
            $table->integer('phan_quyen')->unsigned();
            $table->timestamps();
            $table->boolean("da_xoa")->default(0);
            $table->foreign('phan_quyen')->references('id')->on('phan_quyen');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(Blueprint $table)
    {
        $table->dropForeign(['phan_quyen']);
        Schema::dropIfExists('nhan_vien');
    }
}
