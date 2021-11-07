<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMouFollowerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('mou_follower')) {
        Schema::create('mou_follower', function (Blueprint $table) {
            $table->id();
            $table->string('prefix',6);
            $table->string('name',20);
            $table->string('surname',20);
            $table->string('employee_id',10);
            
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
