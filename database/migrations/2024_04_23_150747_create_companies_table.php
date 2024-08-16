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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string("companyName")->unique();
            $table->String("companySlogna")->nullable()->unique();
            $table->String("address")->nullable();
            $table->enum("status",['active', 'inactive'])->default('active');
            $table->text("companyImage")->nullable();
            $table->text("companyAlvara")->nullable();
            $table->text("companyDiario")->nullable();
            $table->text("companyNif")->nullable();
            $table->text("companyCertidao")->nullable();

            $table->foreignId("user_id")->constrained();
            $table->foreignId("neighbor_id")->constrained();
            $table->foreignId("category_id")->constrained();
            $table->foreignId("kind_company_id")->constrained();
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
        Schema::dropIfExists('companies');
    }
};
