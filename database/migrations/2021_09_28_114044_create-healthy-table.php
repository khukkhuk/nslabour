<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHealthyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    if (!Schema::hasTable('healthy')) {
        Schema::create('healthy', function (Blueprint $table) {
            $table->id();
            
            $table->string('title_id',5);
            $table->string('business_type',40);
            $table->string('inspector',30);
            $table->string('insurance_create',20);
            $table->string('insurance_expire',20);
            $table->string('insurance_period',20);
            $table->string('insurance_right',20);
            $table->string('social_security',20);
            $table->text('notes');
            
            $table->string('created',20);
            $table->string('updated',20);
            $table->string('deleted',20);
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
