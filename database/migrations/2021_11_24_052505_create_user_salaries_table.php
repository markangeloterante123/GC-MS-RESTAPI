<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserSalariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_salaries', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('payslip_link');
            $table->double('basic_salary');
            $table->double('food_allowance');
            $table->double('position_allowance');
            $table->string('effective_date');
            $table->string('end_date');
            $table->text('notes');
            $table->integer('salary_status');
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
        Schema::dropIfExists('user_salaries');
    }
}
