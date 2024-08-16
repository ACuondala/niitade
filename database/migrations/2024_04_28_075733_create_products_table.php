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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->String("name");
            $table->String("images");
            $table->integer("price");
            $table->integer("subprice");
            $table->integer("quatity");
            $table->String("reference");
            $table->String("status");
            $table->String("bonus")->nullable();
            $table->text("description")->nullable();
            $table->foreignId('kind_product_id')->constrained();
            $table->foreignId('company_id')->constrained();
            $table->foreignId('delivery_mode_id')->constrained();
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
        Schema::dropIfExists('products');
    }
};
