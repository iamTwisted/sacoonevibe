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
        Schema::create('share_transactions', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('member_share_id')->constrained('member_shares')->onDelete('cascade');
            $table->enum('tx_type', ['purchase', 'refund']);
            $table->decimal('amount', 15, 2);
            $table->decimal('shares_count', 15, 2);
            $table->foreignUuid('created_by')->constrained('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('share_transactions');
    }
};
