<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCthdTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cthd', function (Blueprint $table) {
            $table->char('MaCTHD',20)->primary();
            $table->string('MaSP',100);
            $table->date('ngaymua');
            $table->integer('soluong');
            $table->foreign('MaSP')->references('MaSP')->on('sanphams');
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cthd');
    }
}
