<?php

use App\Models\Computer;
use App\Models\Peripheral;
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

        Schema::create('peripherals', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->string('serial');
            $table->string('make');
            $table->string('model');
            $table->timestamps();
        });

        Schema::create('computer_peripheral', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Computer::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Peripheral::class)->constrained()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('computer_peripheral');
        Schema::dropIfExists('peripherals');
    }
};
