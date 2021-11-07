<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMouTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    { if (!Schema::hasTable('mou')) {
        Schema::create('mou', function (Blueprint $table) {
        $table->id();
        
        $table->string('type_name',30);
        $table->string('country',20);
        $table->string('type',20);
        $table->string('delete_status',3);
        $table->string('employer_id',3);
        $table->string('employee_id',3);
        $table->string('received_by',3);
        $table->string('created_by',3);
        $table->text('nots');
        
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
