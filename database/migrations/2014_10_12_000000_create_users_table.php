<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->integer('role')->default(0);
            $table->string('api_key')->default('');
            $table->enum('status', ['Free', 'Premium', 'Vip']);
            $table->integer('limit_max')->default(100);
            $table->integer('limit_count')->default(0);
            $table->integer('is_expired')->default(0);
            $table->rememberToken();
            $table->text('profile_photo_path')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->timestamps();
            $table->timestamp('expired_at')->nullable();
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