<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RequestForms extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //users request form details
        Schema::create('forms_access', function (Blueprint $table) {
            $table->increments('id');
            $table->string('request_name')->unique();
            $table->string('username');
            $table->string('date_requested');
            $table->string('name_of_hod');
            $table->string('hod_signature');
            $table->string('approved_date');
            $table->string('name_ict_hod');
            $table->string('ict_signature');
            $table->string('authorized_date');
            $table->timestamps();

            // $table->foreign('advertisement_id')
            //     ->references('id')
            //     ->on('advertisements')
            //     ->onDelete('CASCADE');
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
