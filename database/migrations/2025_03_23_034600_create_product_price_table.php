<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('product_price', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained('products')->onDelete('cascade');
            $table->decimal('price', 10, 2);
            $table->smallInteger('status_id'); // Reference to Status Table
            $table->timestamp('created_at')->useCurrent();
            $table->smallInteger('created_user');
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
            $table->smallInteger('updated_user');
        });
    }

    public function down()
    {
        Schema::dropIfExists('product_price');
    }
};
