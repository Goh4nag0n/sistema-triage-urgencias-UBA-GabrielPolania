<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('triage_records', function (Blueprint $table) {
            $table->id();
            $table->string('patient_name', 150);
            $table->string('manchester_color', 20)->index();
            $table->unsignedSmallInteger('heart_rate')->nullable();
            $table->string('status')->default('pending');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('triage_records');
    }
};
