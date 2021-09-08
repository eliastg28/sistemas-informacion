<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAuditSessionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('audit_sessions', function (Blueprint $table) {
            $table->id();
            $table->string('browser', 30);
            $table->string('device', 30);
            $table->string('system', 30);
            $table->integer('date_init');
            $table->integer('time_hours_init');
            $table->integer('time_minutes_init');
            $table->integer('time_seconds_init');
            $table->integer('date_final');
            $table->integer('time_hours_final');
            $table->integer('time_minutes_final');
            $table->integer('time_seconds_final');
            $table->foreignId('audit_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('audit_sessions');
    }
}
