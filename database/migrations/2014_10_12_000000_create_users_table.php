<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use App\User;

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
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->isActive()->default('0');
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });

        DB::table('users')->insert([
            ['name'=>'User 1', 'email'=>'user1@gmail.com', 'password'=>'123456', 'is_active'=>'0'],
            ['name'=>'User 2', 'email'=>'user2@gmail.com', 'password'=>'123456', 'is_active'=>'1'],
            ['name'=>'User 3', 'email'=>'user3@gmail.com', 'password'=>'123456', 'is_active'=>'1'],
            ['name'=>'User 4', 'email'=>'user4@gmail.com', 'password'=>'123456', 'is_active'=>'0'],
            ['name'=>'User 5', 'email'=>'user5@gmail.com', 'password'=>'123456', 'is_active'=>'1'],
        ]);
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
