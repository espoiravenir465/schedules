<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedules', function (Blueprint $table) {
            //しおりID (schedule_id) /SERIAL
            $table->bigIncrements('schedule_id')->unsigned();
            //しおりタイトル (title)/VARCHAR(20)
            $table->string('title', 20);
            //所有ユーザID (owner_id) /SERIAL
            $table->integer('owner_id');
            //招待ユーザID1 
            $table->string('invite_user_id_1')->default("");
            //招待ユーザID2
            $table->string('invite_user_id_2')->default("");
            //招待ユーザID3
            $table->string('invite_user_id_3')->default("");
            //招待ユーザID4
            $table->string('invite_user_id_4')->default("");
            //招待ユーザID5
            $table->string('invite_user_id_5')->default("");
            //更新日
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
        Schema::dropIfExists('schedules');
    }
}
