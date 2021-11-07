<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployerDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        if (!Schema::hasTable('employer_data')) {
            Schema::create('employer_data', function (Blueprint $table) {
            $table->id();
            $table->string('id_card',20);
            $table->string('legal_number',13);
            $table->string('company_name',30);
    
            $table->string('prefix_th',6);
            $table->string('name_th',20);
            $table->string('surname_th',20);
            $table->string('nickname_th',20);
    
            $table->string('prefix_en',6);
            $table->string('name_en',20);
            $table->string('surname_en',20);
            $table->string('nickname_en',20);
    
            $table->string('address_th',20);
            $table->string('group_th',3);
            $table->string('road_th',20);
            $table->string('province_id',10);
            $table->string('district_id',10);
            $table->string('subdistrict_id',10);
    
            $table->string('address_en',20);
            $table->string('group_en',3);
            $table->string('road_en',20);
    
            $table->string('zipcode',10);
            $table->string('tel_number',13);
            $table->string('email',30);
            $table->string('updated',20);
            $table->string('created',20);
    
            });
        }
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
