<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('orderer_id');
            $table->text('title');
            $table->longText('description');
            $table->date('start_date');
            $table->date('end_date');
            $table->timestamps();
        });
        DB::statement('ALTER TABLE jobs ADD FULLTEXT search(title, description)');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('jobs', function($table) {
            $table->dropIndex('search');
        });
        Schema::dropIfExists('jobs');
    }
}
