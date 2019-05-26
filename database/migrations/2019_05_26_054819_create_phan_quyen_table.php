<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhanQuyenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('phan_quyen')) {
            down('phan_quyen');
        }
        Schema::create('phan_quyen', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('quyen')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(Blueprint $table)
    {
        $table->dropColumn('id');
        Schema::dropIfExists('phan_quyen');
    }
}
