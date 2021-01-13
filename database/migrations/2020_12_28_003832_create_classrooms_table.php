<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassroomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('classroom', function (Blueprint $table) {
            $table->id();
            $table->longText('name')->nullable();
            $table->longText('info_title')->nullable();
            $table->longText('info_image')->nullable();
            $table->longText('info_description')->nullable();
            $table->longText('info_link')->nullable();
            $table->longText('info_remark')->nullable();
            $table->longText('video_title')->nullable();
            $table->longText('video_link')->nullable();
            $table->longText('file1')->nullable();
            $table->longText('file2')->nullable();
            $table->longText('file3')->nullable();
            $table->longText('file4')->nullable();
            $table->longText('file5')->nullable();
            $table->longText('remark')->nullable();
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
        Schema::dropIfExists('classroom');
    }
}
