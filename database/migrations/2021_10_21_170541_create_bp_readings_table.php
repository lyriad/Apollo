<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBPReadingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bp_readings', function (Blueprint $table) {
            $table->id();
            $table->string('hid')->nulable();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('patient_id')->constrained();
            $table->unsignedInteger('systolic'); 
            $table->unsignedInteger('diastolic'); 

            if (config('database.default') == 'myqsl') {
                $table->enum('category', ['normal', 'elevated', 'high_s1', 'high_s2', 'crisis'])->nulable();

            } else {
                $table->string('category')->nulable();
            }

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
        Schema::dropIfExists('bp_readings');
    }
}
