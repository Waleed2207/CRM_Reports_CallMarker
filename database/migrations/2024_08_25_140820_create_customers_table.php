<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('customers')) {
            Schema::create('customers', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->unsignedBigInteger('agent_id');
                $table->timestamps();
    
                $table->foreign('agent_id')->references('id')->on('agents')->onDelete('cascade');
            });
        }
    }
    

    public function down()
    {
        Schema::dropIfExists('customers');
    }
}
