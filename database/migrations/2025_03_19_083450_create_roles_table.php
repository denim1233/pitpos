<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->id(); // Auto-incrementing primary key
            $table->string('name', 100); // Role name
            $table->unsignedBigInteger('status_id')->index(); // Foreign key reference to status table (if exists)
            $table->timestamps(); // Created_at & Updated_at
            $table->unsignedBigInteger('created_user')->nullable(); // User who created the role
            $table->unsignedBigInteger('updated_user')->nullable(); // User who last updated the role

            // Foreign key constraints (optional, if related tables exist)
            $table->foreign('created_user')->references('id')->on('users')->onDelete('set null');
            $table->foreign('updated_user')->references('id')->on('users')->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::dropIfExists('roles');
    }
};
