<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFollowerDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        if (!Schema::hasTable('follower_data')) {
            Schema::create('follower_data', function (Blueprint $table) {
            $table->id();
            $table->string('prefix',6);
            $table->string('name',20);
            $table->string('surname',20);
            $table->string('employee_id',10);
            
            $table->string('delete_status',3);
            $table->string('deleted',20);
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
