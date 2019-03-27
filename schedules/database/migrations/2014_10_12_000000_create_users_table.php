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
            $table->integer('owner_id')->unsigned();
            //メールアドレス(email)/VARCHAR
            $table->string('email')->unique();
            //ニックネーム　(nickname)/VARCHAR(20)
            $table->string('nickname',20);
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
