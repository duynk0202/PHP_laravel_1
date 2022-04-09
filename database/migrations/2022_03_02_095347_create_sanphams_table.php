<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSanphamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sanphams', function (Blueprint $table) {
            $table->char('MaSP',10)->primary();
            $table->string('TenSP',100)->unique();
            $table->string('Mota',20);
            $table->integer('gia');
            $table->char('MaLoai',100);
            $table->char('image',100);
            $table->foreign('MaLoai')->references('MaLoai')->on('theloai');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sanphams');
    }
}
