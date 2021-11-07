<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePinkcardTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        {
            if (!Schema::hasTable('pinkcard')) {
                Schema::create('pinkcard', function (Blueprint $table) {
                    $table->id();
                    
                    $table->string('title_id',5);
                    $table->string('status',10);
                    $table->text('notes');
                    
                    $table->string('created',20);
                    $table->string('updated',20);
                    $table->string('deleted',20);
                    });
                } 
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
