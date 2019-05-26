<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTinTucTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('tin_tuc')) {
            down();
        }
        Schema::create('tin_tuc', function (Blueprint $table) {
            $table->integer('id');
            $table->primary('id');
            $table->integer('id_cha')->nullable();
            $table->string('ten');
            $table->string('ten_khong_dau');
            $table->string('mo_ta');
            $table->text('noi_dung');
            $table->text('keywords');
            $table->timestamps();
            $table->boolean('noi_bat')->default(0);
            $table->boolean('da_xoa')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tin_tuc');
    }
}
