<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->string('application_id')->unique();
            $table->string('apartment')->nullable();
            $table->string('full_name')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('have_kids')->nullable();
            $table->string('kids_under18')->nullable();
            $table->string('kid1')->nullable();
            $table->string('kid1_age')->nullable();
            $table->string('kid2')->nullable();
            $table->string('kid2_age')->nullable();
            $table->string('have_pet')->nullable();
            $table->string('pet_type')->nullable();
            $table->string('current_address')->nullable();
            $table->string('current_address_type')->nullable();
            $table->string('current_address_cost')->nullable();
            $table->string('current_address_landlord_name')->nullable();
            $table->string('current_address_landlord_phone')->nullable();
            $table->string('current_address_from')->nullable();
            $table->string('current_address_to')->nullable();
            $table->string('is_student')->nullable();
            $table->string('employer')->nullable();
            $table->string('employer_job_description')->nullable();
            $table->string('employer_address')->nullable();
            $table->string('employer_phone')->nullable();
            $table->string('annual_salary')->nullable();
            $table->string('supervisor_name')->nullable();
            $table->string('supervisor_phone')->nullable();
            $table->string('employment_from')->nullable();
            $table->string('employment_to')->nullable();
            $table->string('past_employer')->nullable();
            $table->string('past_employer_job_description')->nullable();
            $table->string('past_employer_address')->nullable();
            $table->string('past_employer_phone')->nullable();
            $table->string('past_annual_salary')->nullable();
            $table->string('past_supervisor_name')->nullable();
            $table->string('past_supervisor_phone')->nullable();
            $table->string('past_employment_from')->nullable();
            $table->string('past_employment_to')->nullable();
            $table->string('school')->nullable();
            $table->string('school_major')->nullable();
            $table->string('school_enrollemnt_date')->nullable();
            $table->string('school_graduation_date')->nullable();
            $table->string('school_stipend')->nullable();
            $table->string('other_income_from')->nullable();
            $table->string('other_income_amount')->nullable();
            $table->string('emergency_contact_name')->nullable();
            $table->string('emergency_contact_relationship')->nullable();
            $table->string('emergency_contact_phone')->nullable();
            $table->string('desired_occupancy_from')->nullable();
            $table->string('desired_occupancy_to')->nullable();
            $table->longText('reason_for_moving')->nullable();
            $table->string('legal_question')->nullable();
            $table->string('legal_explanation')->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('applications');
    }
}
