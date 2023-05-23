<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('order_demand', function (Blueprint $table) {
            $table->integer('order_id');
            $table->integer('demand_id');
            $table->string('name');
            $table->decimal('price', 8, 2);
            $table->integer('units');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('order_demand');
    }
};
