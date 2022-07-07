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
            //FOREIGN INVENTORIES
            $table->foreignId('inventory_id')->constrained('inventories')->onDelete('cascade');
            $table->string('ubication');
            $table->string('barcode');
            $table->string('code');
            $table->string('description');
            $table->string('stock');

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
