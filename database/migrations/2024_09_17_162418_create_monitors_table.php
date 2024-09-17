<?php

use App\Models\Computer;
use App\Models\Monitor;
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
        Schema::create('monitors', function (Blueprint $table) {
            $table->id();
            $table->string('serial');
            $table->string('make');
            $table->string('model');
            $table->timestamps();
        });

        Schema::create('computer_monitor', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Computer::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Monitor::class)->constrained()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('computer_monitor');
        Schema::dropIfExists('monitors');
    }
};
