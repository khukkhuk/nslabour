<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        if (!Schema::hasTable('bill')) {
            Schema::create('bill', function (Blueprint $table) {
                $table->id();
                
                $table->string('bill_number',5);
                $table->string('bill_date',20);
                $table->string('bill_type',20);
                $table->string('type',20);
                $table->string('name',20);
                $table->string('tel_number',20);
                $table->string('saver',20)->nullable();
                $table->string('payee',20)->nullable();
                $table->string('payer',20)->nullable();

                $table->string('created',20);
                $table->string('updated',20);
                $table->string('deleted',20);
                });
            } 
            
        if (!Schema::hasTable('bill_detail')) {
            Schema::create('bill_detail', function (Blueprint $table) {
                $table->id();
                
                $table->string('bill_id',5);
                $table->string('amount',20);
                $table->string('type_id',20);

                $table->string('created',20);
                $table->string('updated',20);
                $table->string('deleted',20);
            });
        } 
        
        if (!Schema::hasTable('type')) {
            Schema::create('type', function (Blueprint $table) {
                $table->id();
                
                $table->string('type',20);
                $table->string('type_name',20);
                $table->string('cost',6);

                $table->string('created',20);
                $table->string('updated',20);
                $table->string('deleted',20);
            });
        } 
        
        if (!Schema::hasTable('bill_doc')) {
            Schema::create('bill_doc', function (Blueprint $table) {
                $table->id();
                
                $table->string('bill_id',5);
                $table->string('doc_name',20);
                $table->string('doc_path',20);

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
