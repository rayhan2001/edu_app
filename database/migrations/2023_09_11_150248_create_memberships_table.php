<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('memberships', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('full_name');
            $table->integer('ssc_passing_year');
            $table->string('professor_designation');
            $table->string('place_work');
            $table->integer('mobile_no');
            $table->longText('present_address');
            $table->longText('permanent_address');
            $table->string('birthday');
            $table->integer('nid');
            $table->string('transaction_id');
            $table->integer('transaction_number');
            $table->string('blood_group');
            $table->integer('account_number');
            $table->string('email');
            $table->integer('status')->default(0);
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
        Schema::dropIfExists('memberships');
    }
};
