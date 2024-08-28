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
        Schema::create('visits', function (Blueprint $table) {
            $table->id();
            $table->foreignId('apartment_id')->constrained()->onDelete('cascade');
            $table->foreignId('runner_id')->constrained()->onDelete('cascade');
            $table->foreignId('potential_tenant_id')->constrained()->onDelete('cascade');
            $table->foreignId('visit_status_id')->constrained()->onDelete('cascade');
            $table->dateTime('visit_date');
            $table->string('visit_description')->nullable();
            $table->string('visit_report')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('visits');
    }
};
