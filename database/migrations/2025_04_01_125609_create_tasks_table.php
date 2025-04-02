<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('title', 255);
            $table->string('description')->nullable();
            $table->dateTime('due_date');
            $table->dateTime('create_date');
            $table->enum('status', ['выполнена', 'не выполнена'])->default('не выполнена');
            $table->enum('priority', ['низкий', 'средний', 'высокий']);
            $table->string('category');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
