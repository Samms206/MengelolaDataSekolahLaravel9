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
        Schema::table('students', function (Blueprint $table) {
            //menambahkan kolom class_id di tabel student
            $table->unsignedBigInteger('class_id')->required()->after('nis');
            //membuat foreign key dari class_id.students ke id.class | class tidak bisa dihapus ketika ada relasi dengan student
            $table->foreign('class_id')->references('id')->on('class')->onDelete('restrict');
            //
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('students', function (Blueprint $table) {
            //hapus foreign keynya
            $table->dropForeign(['class_id']);
            //hapus kolom
            $table->dropColumn('class_id');
        });
    }
};
