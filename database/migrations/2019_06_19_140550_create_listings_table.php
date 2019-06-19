<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateListingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('listings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('company_id');
            $table->integer('term_id');
            $table->integer('category_id');
            $table->integer('level_id');
            $table->integer('experience_id');
            $table->integer('salary_id');
            $table->integer('education_id');
            $table->integer('location_id');
            $table->string('start');
            $table->string('closing');
            $table->text('description');
            $table->text('requirement');
            $table->boolean('live')->default(false);
            
             $table->string('slug')->unique()->nullable();
            
            $table->softDeletes();
            $table->timestamp('expires_at')->nullable();
            $table->timestamps();
            

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('listings');
    }
}
