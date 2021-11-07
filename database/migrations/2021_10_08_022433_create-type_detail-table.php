<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTypeDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        if (!Schema::hasTable('type_detail')) {
            Schema::create('type_detail', function (Blueprint $table) {
                $table->id();
                
                $table->string('type_id',20);
                $table->string('name',20);
                $table->string('cost',6);

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
