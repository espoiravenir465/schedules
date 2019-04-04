<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            //イベントID (event_id)/INTEGER
            $table->increments('event_id')->unsigned();
            //しおりID (schedule_id)/SERIAL
            $table->integer('schedule_id')->unsigned();
            //イベント名 (event_title)/VARCHAR(50)
            $table->string('event_title',50);
            //イベント時間('event_time')/TIME
            $table->time('event_time');
            //登録日時 (created_at)/TIMESTAMP
            $table->timestamps();
            
            
            //外部キー
            $table->engine = 'InnoDB';
             $table->foreign('schedule_id')
                    ->references('schedule_id')
                    ->on('schedules')
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
        Schema::dropIfExists('events');
    }
}
