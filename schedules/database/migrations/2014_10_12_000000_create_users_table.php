<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
        //所有ユーザID　(owner_id)/ SERIAL
         $table->increments('owner_id');
         //メールアドレス(email)/VARCHAR
         $table->string('email')->unique();
         //名前　(name)/VARCHAR(20)
         $table->string('name',20);
         //パスワード  (password)/CHAR(10)
         $table->char('password',10);
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
        Schema::dropIfExists('users');
    }
}
