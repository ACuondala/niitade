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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->String('namePost');
            $table->String('titlePost');
            $table->longText('description')->nullable();
            $table->integer("view_count")->default(0);
            $table->foreignId('product_id')->constrained()->nullable();
            $table->foreignId('company_id')->constrained();
            $table->foreignId('post_link_id')->constrained();
            $table->foreignId('plan_id')->constrained();
            $table->foreignId('category_id')->constrained();
            $table->foreignId('sponsor_id')->constrained()->nullable();
            $table->foreignId('expecific_public_id')->constrained()->nullable();
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
        Schema::dropIfExists('posts');
    }
};
