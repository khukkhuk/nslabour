<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
    if (!Schema::hasTable('doc_data')) {
        Schema::create('doc_data', function (Blueprint $table) {
            $table->id();
            
            $table->string('detail_id',5);
            $table->string('doc_name',40);
            $table->string('path',50);
            $table->string('deleted_status',5);
            
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
