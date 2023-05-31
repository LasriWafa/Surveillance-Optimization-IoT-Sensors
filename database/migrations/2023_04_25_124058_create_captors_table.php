<?php

// use : php artisan make:model Captor -m to create a model and this table

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCaptorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('captors', function (Blueprint $table) {
            
            $table->id();

            // the captors table will have a foreign key called (user_id) 
            // which is the primary key of the users table (id)
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->string('IMEI');   // IMEI = captor ID

            $table->string('name');
          
            $table->string('manufactor');
            $table->text('image');

            $table->boolean('status')->default(false);
           
            $table->timestamps();
            // location field ?
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('captors');
    }
}
