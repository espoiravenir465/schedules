<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('photos', function (Blueprint $table) {
            //写真ID (photo_id)/INTEGER
                $table->increments('photo_id')->unsigned();
             //イベントID(event_id)/INTEGER
             $table->integer('event_id')->unsigned();
            //イベント名 (event_title)/VARCHAR(50)
                 $table->string('event_title',50);
            //登録日時 (created_at)/TIMESTAMP
                $table->timestamps();

            

            //外部キー
             $table->engine = 'InnoDB';
             $table->foreign('event_id')
                    ->references('event_id')
                     ->on('events')
                     ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('photos');
    }
}
