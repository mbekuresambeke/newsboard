<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class HodDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Head of Departments Details 

        Schema::create('hod_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('users_details')->unsigned();
            $table->string('name');
            $table->string('signature');
            $table->string('role_given');
            $table->string('date');
            $table->timestamps();

            $table->foreign('users_details_id')
                ->references('id')
                ->on('users_details')
                ->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
