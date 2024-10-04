<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartItemsTable extends Migration
{
    public function up()
    {
        Schema::create('cart_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cart_id')->constrained();
            $table->foreignId('product_id')->constrained('products')->onDelete('cascade'); 
            $table->foreignId('battery_id')->constrained('batterys')->onDelete('cascade'); 
            $table->foreignId('variant_id')->constrained('variants')->onDelete('cascade'); 
            $table->foreignId('color_id')->constrained('colours')->onDelete('cascade'); 
            $table->integer('quantity')->default(1); // Số lượng
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('cart_items');
    }
}
