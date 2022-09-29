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
        Schema::table('products', function (Blueprint $table) {
           $table->string('name')->unique();
           $table->string('details')->nullable();
           $table->decimal('price', 8, 2);
           $table->text('description');
           $table->unsignedBigInteger('category_id');
           $table->unsignedBigInteger('brand_id');
           $table->unsignedInteger('status')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn(['name', 'detail', 'price', 'description', 'category_id', 'brand_id', 'status']);
        });
    }
};
