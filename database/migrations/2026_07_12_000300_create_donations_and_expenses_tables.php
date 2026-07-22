<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('donations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('donation_channel_id')->nullable()->constrained()->nullOnDelete();
            $table->string('donor_name', 120);
            $table->string('display_name', 120)->nullable();
            $table->string('email')->nullable();
            $table->string('phone', 30)->nullable();
            $table->decimal('amount', 14, 2);
            $table->date('donated_at');
            $table->string('reference_number', 100)->nullable()->index();
            $table->string('slip_path');
            $table->text('note')->nullable();
            $table->enum('status', ['pending', 'confirmed', 'rejected'])->default('pending')->index();
            $table->boolean('is_anonymous')->default(false);
            $table->foreignId('reviewed_by')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamp('reviewed_at')->nullable();
            $table->string('rejection_reason', 255)->nullable();
            $table->timestamps();
            $table->index(['status', 'donated_at']);
        });

        Schema::create('expenses', function (Blueprint $table) {
            $table->id();
            $table->enum('category', ['food', 'medical', 'utilities', 'transport', 'maintenance', 'other'])->index();
            $table->string('title', 160);
            $table->text('description')->nullable();
            $table->decimal('amount', 14, 2);
            $table->date('spent_at')->index();
            $table->string('receipt_path')->nullable();
            $table->boolean('is_published')->default(true)->index();
            $table->foreignId('created_by')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('expenses');
        Schema::dropIfExists('donations');
    }
};
