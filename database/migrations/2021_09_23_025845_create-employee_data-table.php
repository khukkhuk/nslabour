<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //if (!Schema::hasTable('borderpass_employee')) {
        Schema::create('employee_data', function (Blueprint $table) {
            $table->id();
            $table->string('prefix',10);
            $table->string('name',20);
            $table->string('surname',20);
            $table->string('gender',10);
            $table->string('b_date',20);
            $table->string('age',3);
            $table->string('b_place',20);
            $table->string('tel_number',20);
            $table->string('couple_status',10);

            $table->string('business',20);
            $table->string('position',20);
            $table->string('workplace_type',10);
            $table->string('workplace_address_th',20);
            $table->string('workplace_group_th',10);
            $table->string('workplace_road_th',20);

            $table->string('workplace_province_id',10);
            $table->string('workplace_district_id',10);
            $table->string('workplace_subdistrict_id',10);
            $table->string('workplace_zipcode',10);

            $table->string('workplace_address_en',20);
            $table->string('workplace_group_en',10);
            $table->string('workplace_road_en',20);

            $table->string('m_prefix',6);
            $table->string('m_name',20);
            $table->string('m_surname',20);

            $table->string('f_prefix',6);
            $table->string('f_name',20);
            $table->string('f_surname',20);
            $table->string('follower',10);

            $table->string('passport_type',10);
            $table->string('passport_number',20);
            $table->string('passport_place',20);
            $table->string('passport_country',20);
            $table->date('passport_create',20);
            $table->date('passport_expire',20);

            $table->string('permit_number',20);
            $table->date('permit_created',20);
            $table->date('permit_expire',20);
            
            $table->string('employer_id',10);
            $table->string('updated',20);
            $table->string('created',20);
        });
    
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
