<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHrVersion extends Migration
{
  /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hr_versions', function (Blueprint $table) {
            $table->increments('ID');
            $table->text('division', 254)->nullable();
            $table->text('section_unit', 254)->nullable();
            $table->text('office_location', 254)->nullable();
            $table->text('item_number', 254)->nullable();
            $table->text('date_position', 254)->nullable();
            $table->text('position_title', 254)->nullable();
            $table->text('parenthetical_title', 254)->nullable();
            $table->integer('position_level')->nullable();
            $table->integer('sg')->nullable();
            $table->integer('salary_step_increment')->nullable();
            $table->text('monthly_rate', 254)->nullable();
            $table->text('designation', 254)->nullable();
            $table->text('date_of_designation', 254)->nullable();
            $table->text('special_order_no', 254)->nullable();
            $table->text('office_bureau_service_program', 254)->nullable();
            $table->text('fund_source_for_contractual', 254)->nullable();
            $table->text('employment_status', 254)->nullable();
            $table->text('status_filled_unfilled', 254)->nullable();
            $table->text('mode_of_accession', 254)->nullable();
            $table->text('date_filled_up_assumption', 254)->nullable();
            $table->text('full_name', 254)->nullable();
            $table->text('last_name', 254)->nullable();
            $table->text('first_name', 254)->nullable();
            $table->text('middle_name', 254)->nullable();
            $table->text('ext', 254)->nullable();
            $table->text('date_of_original_appointment', 254)->nullable();
            $table->text('date_of_last_promotion', 254)->nullable();
            $table->text('entry_date_in_dswd', 254)->nullable();
            $table->text('eligibility_csc_and_other_eligibilities', 254)->nullable();
            $table->text('eligibility_license_ra_1080', 254)->nullable();
            $table->text('license', 254)->nullable();
            $table->text('highest_level_of_eligibility_1st_2nd', 254)->nullable();
            $table->text('highest_education_completed', 254)->nullable();
            $table->text('degree_and_course_1st_course_vocational', 254)->nullable();
            $table->text('degree_and_course_2nd_course', 254)->nullable();
            $table->text('other_course', 254)->nullable();
            $table->text('masters_or_doctoral_degree', 254)->nullable();
            $table->text('gender', 254)->nullable();
            $table->text('date_of_birth', 254)->nullable();
            $table->integer('age')->nullable();
            $table->text('civil_status', 254)->nullable();
            $table->text('street_current', 254)->nullable();
            $table->text('purok_subdivision_current', 254)->nullable();
            $table->text('barangay_current', 254)->nullable();
            $table->text('city_municipality_current', 254)->nullable();
            $table->text('province_current', 254)->nullable();
            $table->text('permanent_address', 254)->nullable();
            $table->text('permanent_address_street', 254)->nullable();
            $table->text('permanent_address_purok', 254)->nullable();
            $table->text('permanent_address_subdivision_community_village', 254)->nullable();
            $table->text('permanent_address_barangay', 254)->nullable();
            $table->text('permanent_address_region', 254)->nullable();
            $table->text('permanent_address_city_municipality', 254)->nullable();
            $table->text('permanent_address_province', 254)->nullable();
            $table->text('bd', 254)->nullable();
            $table->text('indicate_whether_solo_parent', 254)->nullable();
            $table->text('indicate_whether_senior_citizen', 254)->nullable();
            $table->text('indicate_whether_pwd', 254)->nullable();
            $table->text('type_of_disability', 254)->nullable();
            $table->text('indicate_if_indigenous_group', 254)->nullable();
            $table->text('active_and_working_email_address', 254)->nullable();
            $table->text('former_incumbent', 254)->nullable();
            $table->text('mode_of_separation', 254)->nullable();
            $table->text('date_vacated', 254)->nullable();
            $table->text('remarks_status_of_vacant_position', 254)->nullable();
            $table->text('employee_id_no', 254)->nullable();
            $table->text('bir_tin_number', 254)->nullable();
            $table->text('philhealth_number', 254)->nullable();
            $table->text('sss_number', 254)->nullable();
            $table->text('pagibig_number', 254)->nullable();
            $table->text('gsis_number', 254)->nullable();
            $table->text('blood_type', 254)->nullable();
            $table->text('highest_level_of_eligibility_1st_and_2nd', 254)->nullable();
            $table->text('highest_level_eligibility_1st_and_2nd', 254)->nullable();
            $table->text('eligibility_csc_and_other_eligibilities eligibilities', 254)->nullable();

            // Timestamps if needed
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
        Schema::dropIfExists('hr_versions');
    }
}
