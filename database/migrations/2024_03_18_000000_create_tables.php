<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        // Status Table
        Schema::create('statuses', function (Blueprint $table) {
            $table->smallIncrements('id'); // SMALL INT Auto Increment
            $table->string('name', 100);
            $table->timestamp('created_date')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_date')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
            $table->smallInteger('created_user');
            $table->smallInteger('updated_user');
        });

        // Category Table
        Schema::create('categories', function (Blueprint $table) {
            $table->id(); // INT Auto Increment
            $table->string('name', 100);
            $table->tinyInteger('status_id'); // Reference to Status Table
            $table->timestamp('created_date')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_date')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
            $table->smallInteger('created_user');
            $table->smallInteger('updated_user');
        });

        // Product Table
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('description', 300);
            $table->smallInteger('status_id'); // Reference to Status Table
            $table->smallInteger('category_id'); // Reference to Category Table
            $table->smallInteger('unit_id')->default(1)->after('category_id'); // New column
            $table->timestamp('created_date')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_date')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
            $table->smallInteger('created_user');
            $table->smallInteger('updated_user');
        });

        // Unit of Measure Table
        Schema::create('unit_of_measures', function (Blueprint $table) {
            $table->smallIncrements('id'); // SMALL INT Auto Increment
            $table->string('name', 100);
            $table->smallInteger('status_id'); // Reference to Status Table
            $table->decimal('price', 10, 2);
            $table->tinyInteger('set_as_default'); // Boolean (0 = false, 1 = true)
            $table->timestamp('created_date')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_date')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
            $table->smallInteger('created_user');
            $table->smallInteger('updated_user');
        });
    }

    public function down()
    {
        Schema::dropIfExists('unit_of_measures');
        Schema::dropIfExists('products');
        Schema::dropIfExists('categories');
        Schema::dropIfExists('statuses');
    }
};
