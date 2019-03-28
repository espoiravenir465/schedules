<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            //コメントID (comment_id)/SERIAL
            $table->increments('comment_id')->unsigned();
            //イベントID (event_id)/INTEGER
            $table->integer('event_id')->unsigned();
            
            //イベントタイトル(event_title)/VARCHAR(50)
            $table->string('event_title',50);
            //登録日時
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
        Schema::dropIfExists('comments');
    }
}
