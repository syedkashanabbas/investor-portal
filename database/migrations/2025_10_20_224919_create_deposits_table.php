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
        Schema::create('deposits', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('reference_no', 100)->unique();
            $table->decimal('amount', 12, 2);
            $table->string('currency', 10)->default('GBP');
            $table->string('payment_method', 50)->nullable();
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('approved');
            $table->text('remarks')->nullable();
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('deposits');
    }
};
