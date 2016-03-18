<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class LogSys extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {

        Schema::create('agents_log', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 200);
            $table->string('browser', 200);
            $table->string('browser_version', 200);
            $table->softDeletes();
            $table->timestamps();
        });
        Schema::create('devices_log', function (Blueprint $table) {
            $table->increments('id');
            $table->string('kind', 200);
            $table->string('platform_os', 200);
            $table->tinyInteger('is_mobile');
            $table->softDeletes();
            $table->timestamps();
        });
        Schema::create('route_log', function (Blueprint $table) {
            $table->increments('id');
            $table->string('url', 400);
            $table->string('name', 300);
            $table->string('action', 300);
            $table->string('input_data');
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('sql_log', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code', 500);
            $table->string('message');
            $table->string('statement');
            $table->softDeletes();
            $table->timestamps();
        });
        Schema::create('user_log', function (Blueprint $table) {
            $table->increments('id');
            $table->string('uuid', 500);
            $table->integer('user_id')->unsigned()->index('user_id');
            $table->integer('device_id')->unsigned()->index('device_id');
            $table->string('client_ip', 500);
            $table->tinyInteger('is_robot');
            $table->integer('route_id')->unsigned()->index('route_id');
            $table->integer('sql_query_id')->unsigned()->index('sql_query_id');
            $table->integer('error_type');
            $table->softDeletes();
            $table->timestamps();
        });


        Schema::table('user_log', function (Blueprint $table) {
            $table->foreign('route_id')->references('id')->on('route_log')->onDelete('cascade')->onUpdate('restrict');
            $table->foreign('device_id')->references('id')->on('devices_log')->onDelete('cascade')->onUpdate('restrict');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('restrict')->onUpdate('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        //
    }

}
