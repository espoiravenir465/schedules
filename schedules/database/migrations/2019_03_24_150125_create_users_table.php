<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserTable extends Migration
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
            $table->integer('owner_id');
            //メールアドレス(email)/VARCHAR
            $table->string('email');
            //ニックネーム　(nickname)/VARCHAR(20)
            $table->string('nickname',20);
            //パスワード  (password)/CHAR(10)
            $table->CHAR('password',10);
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
