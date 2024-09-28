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
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->integer('customer_id')->nullable();
            $table->integer('package_id')->nullable();
            $table->integer('payment_id')->nullable();
            $table->string('model')->nullable();
            $table->string('license_plate')->nullable()->unique();
            $table->string('color')->nullable();
            $table->text('services')->nullable();
            $table->enum('status', ['completed', 'incomplete', 'delivered'])->default('incomplete');
            $table->enum('pay_status', ['paid', 'unpaid'])->default('unpaid');
            $table->timestamp('completed_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
