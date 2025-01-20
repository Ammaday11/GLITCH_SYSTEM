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
        Schema::create('glitches', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // Foreign key for the creator of the glitch
            $table->string('room_no');
            $table->string('guest_name')->nullable();
            $table->enum('category', ['General request', 'Complaint', 'Issue']);
            $table->string('title');
            $table->text('description')->nullable();
            $table->enum('status', ['Pending', 'Ongoing', 'Resolved', 'Follow-up Pending', 'Suspended'])->default('Pending');
            $table->unsignedBigInteger('updated_by')->nullable(); // Last updated by
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('departments');
    }
};
