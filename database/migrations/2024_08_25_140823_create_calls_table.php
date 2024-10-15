<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCallsTable extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('calls')) {
            Schema::create('calls', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('customer_id');
                $table->unsignedBigInteger('agent_id');
                $table->integer('duration'); // Call duration in seconds
                $table->timestamps();

                $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
                $table->foreign('agent_id')->references('id')->on('agents')->onDelete('cascade');
            });
        }
    }

    public function down()
    {
        Schema::dropIfExists('calls');
    }
}
