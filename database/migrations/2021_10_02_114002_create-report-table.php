<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('report')) {
            Schema::create('report', function (Blueprint $table) {
                $table->id();
                
                $table->string('title_id',5);
                $table->string('report_date',20);
                $table->string('report_expire',20);
                $table->text('note',200);

                $table->string('created',20);
                $table->string('updated',20);
                $table->string('deleted',20);
                });
            } 
        //
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
