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
            $table->string('email')->unique();
            $table->string('name', 100);
            $table->string('password');
            $table->string('password_verified');
            $table->string('cellphone',10)->nullable();
            $table->string('id_card', 11); //cedula
            $table->string('date_born'); //fecha_nac
            $table->integer('city_cod'); //cod_ciudad
            $table->rememberToken();

            
            $table->unsignedBigInteger('id_role')->nullable()->default(2);
            $table->foreign('id_role')->references('id')
            ->on('roles')->onDelete('cascade');
            
            // $table->timestamps();
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
