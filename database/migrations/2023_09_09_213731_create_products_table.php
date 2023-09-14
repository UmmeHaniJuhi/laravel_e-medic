<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreign('cat_id')->references('id')->on('categories')->onDelete('cascade');
            $table->integer('subcat_id');
            $table->integer('br_id');
            $table->string('code');
            $table->string('name');
            $table->string('description');
            $table->float('price');
            $table->string('image');
            $table->boolean('status')->default(1);
            $table->timestamps();
           
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
