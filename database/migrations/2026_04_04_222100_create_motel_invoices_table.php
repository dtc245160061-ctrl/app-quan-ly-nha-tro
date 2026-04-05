<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        if (Schema::hasTable('motel_invoices')) {
            return;
        }

        Schema::create('motel_invoices', function (Blueprint $table) {
            $table->id();
            $table->foreignId('contract_id')->constrained('motel_contracts')->cascadeOnDelete();
            $table->date('issued_date');
            $table->decimal('amount', 12, 2);
            $table->string('status')->default('unpaid');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('motel_invoices');
    }
};
