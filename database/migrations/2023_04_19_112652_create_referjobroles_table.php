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
        Schema::create('referjobroles', function (Blueprint $table) {
            $table->id();
            $table->text('referjobrole_id')->serialize()->searchable();
            $table->foreignId('user_id')->unsigned()->cascadeOnDelete()->nullable();
            $table->string('referjobrole_by')->searchable();//user name from observers(current user)
            $table->string('job_title')->searchable();
            $table->string('referjobrole_state')->searchable()->nullable();
            $table->string('referjobrole_city')->searchable()->nullable();
            $table->string('referjobrole_rate')->nullable();
            $table->string('referjobrole_visa')->nullable();
            $table->string('implementation_name')->nullable();
            $table->string('imp_email')->nullable();
            $table->string('imp_contact')->nullable();
            $table->string('pv_name')->nullable();
            $table->string('pv_email')->nullable();
            $table->string('pv_contact')->nullable();
            $table->string('end_client')->nullable();
            $table->text('job_description')->nullable();
            $table->timestamps();
        });
        Schema::table('referjobroles', function ($table) {
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('referjobroles');
    }
};
