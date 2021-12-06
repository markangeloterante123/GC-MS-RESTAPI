<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_information', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->unique();
            $table->integer('gc_id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('middle_name');
            $table->string('profile');
            $table->string('birthday');
            $table->enum('gender',['Male','Female']);
            $table->enum('marital_status',['Single', 'Married', 'Widowed', 'Devorced']);
            $table->string('spouce_work');
            $table->string('spouce_name');
            $table->string('spouce_birthdate');
            $table->integer('no_children');
            $table->string('personal_email');
            $table->string('phone_no');
            $table->string('cel_no');
            $table->string('address_1');
            $table->string('address_2');
            $table->string('emergency_name');
            $table->string('emergency_relation');
            $table->string('emergency_contact');
            $table->string('work_email');
            $table->enum('position',['Front-End Developer', 'Back-End Developer', 'Full-Stack Developer', 'Designer','Human Resources']);
            $table->integer('level');
            $table->string('team_id');
            $table->string('404_records_link');
            $table->string('pay_slip_link');
            $table->double('salary');
            $table->string('date_hired');
            $table->string('date_end');
            $table->enum('contract_status', ['Interns', 'Probitionary', 'Regular', 'End of Contract', 'AWOL']);
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
        Schema::dropIfExists('user_information');
    }
}
