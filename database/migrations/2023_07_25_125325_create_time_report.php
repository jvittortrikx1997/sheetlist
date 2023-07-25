<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('time_reports', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->date('report_date');
            $table->string('activity');
            $table->unsignedBigInteger('category_id')->nullable();
            $table->unsignedBigInteger('project_id')->nullable();
            $table->unsignedBigInteger('city_id')->nullable();
            $table->string('ticket_number', 20)->nullable();
            $table->string('requester')->nullable();
            $table->unsignedBigInteger('system_id')->nullable();
            $table->time('start_time');
            $table->time('end_time');
            $table->string('description', 500)->nullable();
            $table->string('observation', 500)->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('project_id')->references('id')->on('projects');
            $table->foreign('city_id')->references('id')->on('cities');
            $table->foreign('system_id')->references('id')->on('systems');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('time_reports');
    }
};
