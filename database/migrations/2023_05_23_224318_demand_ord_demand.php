<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('demand_ord_demand', function (Blueprint $table) {
            $table->integer('demand_id');
            $table->integer('ord_demand_id');
            $table->string('name');
            $table->decimal('price', 8, 2);
            $table->integer('units');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('demand_ord_demand');
    }
};
