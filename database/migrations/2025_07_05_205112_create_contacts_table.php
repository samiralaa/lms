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
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->string('full_name'); // Required, max 255
            $table->string('email'); // Required, max 255
            $table->enum('category', ['General Inquiry', 'Technical Support', 'Billing', 'Feedback', 'Other']); // Required, predefined categories
            $table->string('subject'); // Required, max 255
            $table->text('message'); // Required, unlimited text
            $table->enum('status', ['New', 'In Progress', 'Resolved', 'Closed'])->default('New'); // Status tracking
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contacts');
    }
};
