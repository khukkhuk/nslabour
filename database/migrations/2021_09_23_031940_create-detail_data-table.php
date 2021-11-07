<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
    if (!Schema::hasTable('detail_data')) {
        Schema::create('detail_data', function (Blueprint $table) {
            
            $table->id();
            
            $table->string('title_id',5);
            $table->string('type',40);
            $table->string('created_by',30);
            $table->string('sent',20);
            $table->string('sent_by',20);
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
