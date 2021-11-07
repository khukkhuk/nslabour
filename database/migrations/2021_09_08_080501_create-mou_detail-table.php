<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMouDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    { 
        if (!Schema::hasTable('mou_detail')) {
        Schema::create('mou_detail', function (Blueprint $table) {
        $table->id();
        $table->string('mou_id',6);
        $table->string('type',30);
        $table->string('created_by',10);
        $table->string('received',20);
        $table->text('notes',null);
        $table->string('created',20);
        $table->string('updated',10,null);
        // $table->string('received_by',10);
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
