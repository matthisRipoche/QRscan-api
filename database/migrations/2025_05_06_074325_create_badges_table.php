<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('badges', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->string('status', 255);
            $table->dateTime('last_import')->nullable();
            $table->foreignId('event_id')->constrained()->onDelete('cascade');
            $table->unsignedBigInteger('user_id')->nullable();

            $table->unsignedBigInteger('type_acces_id')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('badges');
    }
};
