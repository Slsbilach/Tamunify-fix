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
        Schema::create('visitor_recurrings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('visitor_id')->constrained()->onDelete('cascade');
            $table->string('company');
            $table->enum('recurring_type', ['Orang Tua/Wali Peserta Magang', 'Vendor/Supplier Rutin', 'Mitra Bisnis', 'Kontraktor', 'Lainnya']);
            $table->string('related_to');
            $table->enum('relation', ['Orang Tua', 'Vendor', 'Mitra', 'Kontraktor', 'Lainnya']);
            $table->enum('department', ['Produksi', 'Engineering', 'HRD', 'Keuangan', 'Marketing', 'IT', 'lainnya']);
            $table->date('access_start');
            $table->date('access_end');
            $table->string('vehicle_number')->nullable();
            $table->json('visit_days');
            $table->time('usual_entry_time');
            $table->time('usual_exit_time');
            $table->text('additional_info')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('visitor_recurrings');
    }
};