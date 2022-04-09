<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class  CreateHoadonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hoadon', function (Blueprint $table) {
            $table->string('MaHD',30)->primary();
            $table->char('MaCTHD',20);
            $table->integer('MaKH');
            $table->foreign('MaKH')->references('id')->on('users');
            $table->foreign('MaCTHD')->references('MaCTHD')->on('cthd');
        });
    }
   
    /**
     * Reverse the migrations.
     *
     * @return void
     */
   
    public function down()
    {
        Schema::dropIfExists('hoadon');
    }
}
