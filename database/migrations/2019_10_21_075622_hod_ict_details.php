<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class HodIctDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // APPROVAL FROM  HEAD OF ICT 

        Schema::create('hodict', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('users_details')->unsigned();
            $table->string('name');
            $table->string('signature');
            $table->string('dateofapproval');
            $table->timestamps();

            $table->foreign('users_details_id')
                ->references('id')
                ->on('advertisements')
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
