<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('donation_channels', function (Blueprint $table) {
            $table->id();
            $table->string('provider', 40);
            $table->string('account_name', 120);
            $table->string('account_number', 100);
            $table->string('qr_path')->nullable();
            $table->unsignedSmallInteger('sort_order')->default(0);
            $table->boolean('is_active')->default(true)->index();
            $table->timestamps();
        });
    }

    public function down(): void { Schema::dropIfExists('donation_channels'); }
};
