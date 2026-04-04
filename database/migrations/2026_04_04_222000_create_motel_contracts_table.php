<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        if (Schema::hasTable('motel_contracts')) {
            return;
        }

        Schema::create('motel_contracts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('room_id')->constrained('motel_rooms')->cascadeOnDelete();
            $table->foreignId('tenant_id')->constrained('motel_tenants')->cascadeOnDelete();
            $table->date('start_date');
            $table->date('end_date')->nullable();
            $table->string('status')->default('active');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('motel_contracts');
    }
};
