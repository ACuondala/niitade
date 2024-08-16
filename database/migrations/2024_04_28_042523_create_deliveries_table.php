<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deliveries', function (Blueprint $table) {
            $table->id();
            $table->String("firstname");
            $table->String("lastname");
            $table->String("deliveryImage");
            $table->text("bi");
            $table->text("carta");
            $table->text("registroCriminal")->nullable();
            $table->integer("phone");
            $table->String("address")->nullable();
            $table->String("Status")->default("pedding");
            $table->foreignId('neighbor_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('deliveries');
    }
};
