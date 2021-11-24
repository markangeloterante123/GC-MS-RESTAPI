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
        Schema::create('tbl_users_salary', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('payslip_link');
            $table->double('basic_salary');
            $table->double('food_allowance');
            $table->double('position_allowance');
            $table->date('effective_date');
            $table->date('end_date');
            $table->text('notes');
            $table->integer('salaray_status');
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
